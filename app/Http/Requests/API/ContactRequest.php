<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|string|email',
            'phone' => 'required|digits:11',
            'message' => 'required|string|min:10'
        ];
    }
    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'message' => 'محتوي الرسالة'
        ];
    }
}
