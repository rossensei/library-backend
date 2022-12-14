<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        return response()->json([
            'books' => Book::orderBy('id')->get()
        ]);
    }

    public function show(Book $book) {
        return response()->json($book);
    }

    public function update(Book $book, Request $request) {
        $book->update($request->all());
        return response()->json($book);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'pagecount' => 'numeric|required',
            'auth_name' => 'string|required',
            'type' => 'string|required',
        ]);

        $book = Book::create($request->all());
        return response()->json($book);
    }

    public function destroy(Book $book) {
        $book->delete();
        return response()->json(['message'=>'This book has been deleted.']);
    }
}
