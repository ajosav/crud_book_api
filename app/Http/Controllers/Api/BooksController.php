<?php

namespace App\Http\Controllers\Api;

use App\Facades\BookFacade;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\BookCreationRequest;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookFacade::retrieveAll();
    }

    public function store(BookCreationRequest $request)
    {
        return BookFacade::createBook($request->validated());
    }

    /**
     * retrieve the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->success("Found a book with your id", $book->format());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  model $book
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateBookRequest $request,  Book $book)
    {
        $new_book = $request->validated();
        return BookFacade::updateBook($new_book, $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        return BookFacade::deleteBook($book);
    }
}
