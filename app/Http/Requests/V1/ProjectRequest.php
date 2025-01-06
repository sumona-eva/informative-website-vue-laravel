<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'project_category_id' => 'required|integer',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'order_number' =>  'required|integer',
            'images' => 'array|nullable'
        ];
    }

    protected $stopOnFirstFailure = true;
}
