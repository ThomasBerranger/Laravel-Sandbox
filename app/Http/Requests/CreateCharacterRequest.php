<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCharacterRequest extends FormRequest
{
    protected $errorBag = 'createCharacter';

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string', Rule::unique('characters', 'name')],
            'super_power' => ['boolean'],
            'manga_id' => ['required', 'string'],
            'picture' => ['required', 'image']
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => ':input already exist.',
        ];
    }
}
