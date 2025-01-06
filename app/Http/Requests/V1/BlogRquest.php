<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BlogRquest extends FormRequest
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
        return [
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'content' => 'required|string',
            'author_name' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ];
    }
}
