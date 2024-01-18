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
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publication_year' => 'required',
            'pages' => 'required|integer',
            'user_id' => 'required',
        ]);

        // Crear un nuevo libro utilizando los datos validados
        $book = Books::create($validatedData);

        // Retornar una respuesta, por ejemplo, el libro recién creado en formato JSON
        return response()->json($book, 201);
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
    public function destroy($id)
    {
        //
        $book = Books::find($id);
        if(is_null($book)){
            return response()->json('Data not found', 404);
        }
        $book->delete();
        return response()->json(['Book and associated reviews deleted successfully.']);
    }
}
