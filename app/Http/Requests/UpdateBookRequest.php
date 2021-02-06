<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function __construct(Book $book)
    {
       
        // $this->book = Book::findOrFail(request()->());
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $book = $this->route('book');
        return [
            "title" => 'nullable|string|max:255|unique:books,title,'.$book->uuid,
            "author" => 'nullable|string|max:255',
            "description" => 'nullable|string'
        ];

    }

    public function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $validator->after(function ($validator) {
            if (empty($this->validated())) {
                $validator->errors()->add('missing fields', 'At least a field name must be provided.');
            }
        });

        return $validator;
    }
}
