<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Filters\BookFilter;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         //
         $filter = new BookFilter();
         $queryItems = $filter->transform($request);
         $books = Books::where($queryItems);
         return new BookCollection($books->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBooksRequest $request)
    {
        //
        return new BookResource(Books::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        //
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBooksRequest $request, Books $book)
    {
        //
        $book->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        //
    }
}
