<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:15'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'full_name' => trans('main.form.full_name'),
            'email' => trans('main.sign.email'),
            'message' => trans('main.form.content')
        ];
    }
}
