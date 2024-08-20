<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'category_id' => ['nullable','exists:categories,id'], // 'exists:categories,id' means 'exists in categories table, column id
            'title'   => ['required','string'], 
            'content' => ['required','string'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'visible' => ['nullable'],
        ];

        return $rules;
    }
}
