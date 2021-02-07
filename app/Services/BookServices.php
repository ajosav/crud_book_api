<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\QueryException;


class BookServices {

    public function retrieveAll() {
        $books = Book::getFilteredBooks()->map->format();
        
        // Book::all()->load('user');
        return response()->success("Books retrieved successfully", $books);
    }

    public function createBook($data) {
        try {

            $user = auth()->user();
            $book = $user->books()->create($data);

            if(!$book) {
                return response()->errorResponse("Book could not be created");
            }

            return response()->success("Book creation was successful", $book->load('user')->format());

        } catch(QueryException $e) {
            return response()->errorResponse($e->getMessage());
        }
    }

    public function deleteBook($book) {
        try {
            if(!$book->delete()) {
                return response()->errorResponse("We couldn't delete your book");
            }
            return response()->success("Book deleted successfully");
        } catch(QueryException $e) {
            return response()->errorResponse($e->getMessage());
        }
    }

    public function updateBook($new_book, $bookInstance) {
        try {
            
            if(!$bookInstance->update($new_book)) {
                return response()->errorResponse("Book could not be updated");
            }

            return response()->success("Book update was successful", $bookInstance->load('user')->format());

        } catch(QueryException $e) {
            return response()->errorResponse($e->getMessage());
        }
    }
}