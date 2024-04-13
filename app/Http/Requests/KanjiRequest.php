<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KanjiRequest extends FormRequest
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
            'character' => ['required', 'unique:kanjis'],
            'meaning' => 'required',
            'onyomi' => 'required',
            'kunyomi' => 'required',
            'important_reading' => 'required',
            'level' => ['required', 'numeric'],
        ];
    }
}
