<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreBooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //true autorizamos a todos 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => ['required'],
            'author' => ['required'],
            'publicationYear' => ['required'],
            'pages' => ['required'],
            'user_id' => ['required'],
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'publication_year' => $this->publicationYear
        ]);
    }
}
