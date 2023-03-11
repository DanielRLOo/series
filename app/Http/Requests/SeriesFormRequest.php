<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:128'],
            'seasons' => ['required', 'integer', 'min:1'],
            'episodes' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "The 'Name' field must be entered.",
            'name.min' => "The 'Name' field must be at least :min characters long.",
            'name.max' => "The 'Name' field must have less than :max characters long.",
            'seasons.required' => "The 'Seasons' field must be entered.",
            'seasons.min' => "Series must have at least :min season(s).",
            'episodes.required' => "The 'Episodes' field must be entered.",
            'episodes.min' => "Season must have at least :min episode(s).",
        ];
    }
}
