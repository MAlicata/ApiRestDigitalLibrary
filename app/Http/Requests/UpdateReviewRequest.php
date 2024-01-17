<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReviewRequest extends FormRequest
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
        //
            $method = $this->method();
            if($method == 'PUT'){
             return [
                 //
                 'user_id' => ['required'],
                 'book_id' => ['required'],
                 'review_text' => ['required'],
                 'rating' => ['required'],
             ];
            }else{
             return [
                 //
                 'user_id' => ['sometimes','required'],
                 'book_id' => ['sometimes','required'],
                 'review_text' => ['sometimes','required'],
                 'rating' => ['sometimes','required'],
             ];
            }
    
    }
}
