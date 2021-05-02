<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:150|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
