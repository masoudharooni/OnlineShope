<?php

namespace App\Http\Requests\Admin\Users;

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
            'name' => 'required|min:3|max:128|string',
            'email' => 'required|email|unique:users,email,' . $this->request->get('id') . '',
            'mobile' => 'required|digits:11|unique:users,mobile,' . $this->request->get('id') . '',
            'role' => 'required|in:admin,user'
        ];
    }
}
