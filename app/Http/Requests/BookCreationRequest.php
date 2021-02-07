<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;

class BookCreationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => 'required|string|max:255|unique:books',
            "author" => 'required|string|max:255',
            "description" => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Book with the same title already exist in our catalogue'
        ];
    }

    // public function createBook() {
    //     try {

    //         $user = auth()->user();
    //         $book = $user->books()->create($this->validated());

    //         if(!$book) {
    //             return response()->errorResponse("Book could not be created");
    //         }

    //         return response()->success("Book creation was successful", $book->format());

    //     } catch(QueryException $e) {
    //         return response()->errorResponse($e->getMessage());
    //     }
    // }
}
