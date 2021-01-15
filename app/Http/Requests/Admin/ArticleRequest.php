<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title'    => 'required|string|min:3|max:150',
            'content'    => 'required|string|min:15',
            'section_id' => 'required|numeric|exists:sections,id',
            'image' => ($this->method() === 'POST' ? 'required|' : '') . 'image'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'image' => 'صورة المقال',
            'title' => 'عنوان المقال',
            'content' => 'محتوي المقال',
            'section_id' => 'القسم'
        ];
    }
}
