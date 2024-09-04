<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            if ($this->routeIs('login')) {
                return [
                    'email' => 'required|email|string',
                    'password' => 'required|string|min:8',
                ];
            } elseif ($this->routeIs('register')) {
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users|string|max:255',
                    'password' => 'required|string|min:8|confirmed',
                    'password_confirmation' => 'required|string|'
                ];
            } else {
                throw  new \Exception('Invalid method', 405);
            }
    }
}
