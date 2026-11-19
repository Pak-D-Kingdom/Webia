<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('auth.profile');
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        $emailChanged = $request->string('email')->toString() !== $user->email;

        $validated = $request->validateWithBag('profileUpdate', [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'current_password' => [Rule::requiredIf($emailChanged), 'nullable', 'current_password'],
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($emailChanged) {
            $user->markEmailAsUnverified();
            $user->sendEmailVerificationNotification();

            return to_route('verification.notice');
        }

        return to_route('profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('passwordUpdate', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update(['password' => $validated['password']]);

        return to_route('profile.edit')->with('status', 'Kata sandi berhasil diperbarui.');
    }
}
