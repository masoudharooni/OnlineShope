<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'slug' => 'required|unique:categories,slug',
            'title' => 'required'
        ];

        $messages = [
            'required'  => 'فیلدهای زیر را کامل کنید.',
            'unique'    => 'این نامک قبلا ساخته شده است.'
        ];
        $this->validate($rules, $messages);
    }
}
