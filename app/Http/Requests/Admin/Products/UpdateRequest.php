<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'title' => 'required|min:5|max:128',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'thumbnail_url' => 'nullable|image',
            'demo_url' => 'nullable|image',
            'source_url' => 'nullable|image',
            'description' => 'required|min:10'
        ];
    }
}
