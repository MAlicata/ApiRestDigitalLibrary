<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateBooksRequest extends FormRequest
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
        $method = $this->method();
       if($method == 'PUT'){
        return [
            'title' => ['required'],
            'author' => ['required'],
            'publication_year' => ['required'],
            'pages' => ['required'],
        ];
       }else{
        return [
            'title' => ['sometimes','required'],
            'author' => ['sometimes','required'],
            'publication_year' => ['sometimes','required'],
            'pages' => ['sometimes','required'],
        ];
       }
    }
}
