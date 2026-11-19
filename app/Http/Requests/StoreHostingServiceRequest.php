<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHostingServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    /** @return array<string, ValidationRule|array<mixed>|string> */
    public function rules(): array
    {
        return [
            'user_id' => ['required', Rule::exists('users', 'id')->where('role', '!=', 'admin')],
            'website_name' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:255', 'regex:/^(?!https?:\/\/)[a-z0-9](?:[a-z0-9.-]*[a-z0-9])?\.[a-z]{2,}$/i'],
            'monthly_price' => ['required', 'integer', 'min:1'],
            'activation_date' => ['required', 'date', 'after_or_equal:today'],
        ];
    }
}
