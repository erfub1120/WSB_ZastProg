<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'between:1450,2100'],
            'category' => ['required', 'string', 'in:Literatura piękna,Sci-Fi / Fantasy,Biografie,Naukowe'],
            'description' => ['nullable', 'string', 'max:2000'],
            'is_available' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => "Pole 'tytuł książki' jest wymagane.",
            'title.string' => "Pole 'tytuł książki' musi być tekstem.",
            'title.max' => "Pole 'tytuł książki' nie może przekraczać 255 znaków.",
            'year.integer' => "Wartość w polu 'rok wydania' musi być liczbą całkowitą.",
            'year.between' => "Wartość w polu 'rok wydania' musi znajdować się w przedziale od 1450 do 2100.",
            'category.required' => "Pole 'kategoria' jest wymagane.",
            'category.in' => "Wybrana wartość pola 'kategoria' jest nieprawidłowa.",
            'description.string' => "Pole 'opis książki' musi być tekstem.",
            'description.max' => "Pole 'opis książki' nie może przekraczać 2000 znaków.",
            'is_available.boolean' => "Pole 'dostępność w bibliotece' musi mieć wartość prawda lub fałsz.",
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'tytuł książki',
            'year' => 'rok wydania',
            'category' => 'kategoria',
            'description' => 'opis książki',
            'is_available' => 'dostępność w bibliotece',
        ];
    }
}
