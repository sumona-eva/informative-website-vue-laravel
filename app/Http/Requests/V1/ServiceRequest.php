<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required|string|max:200|unique:services',
            'title' => 'required|string|max:255',
            'slug' => 'nullable',
            'icon' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'order_number' => 'required|integer',
            'description' => 'nullable|string',
        ];
    }

    protected $stopOnFirstFailure = true;
}
