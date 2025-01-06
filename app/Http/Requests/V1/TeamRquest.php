<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class TeamRquest extends FormRequest
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
            'name' => 'required|string',
            'photo' => 'required|image',
            'position' => 'required|string',
            'intro' => 'nullable|string|max:255',
            'order_number' => 'required|string',
        ];
    }

    protected $stopOnFirstFailure = true;
}
