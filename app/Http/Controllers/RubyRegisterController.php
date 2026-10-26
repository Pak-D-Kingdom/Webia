<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Password;

class RubyRegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
            'terms' => ['accepted'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Tetapkan role user jika kolom role tersedia.
        if (Schema::hasColumn('users', 'role')) {
            $user->forceFill([
                'role' => 'user',
            ])->save();
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/templates/ruby-luxe')
            ->with(
                'status',
                'Registrasi berhasil! Selamat datang di Ruby Luxe.'
            );
    }
}
