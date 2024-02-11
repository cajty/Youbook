<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
   
    public function index()
    {
        $books = Book::all();
        return view('book', compact('books'));
    }
    public function library()
    {
        $books = Book::all();
        return view('library', compact('books'));
    }

    
    public function create()
    {
        return view('create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);



        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'user_id' => session('user_id'),
        ]);

        return redirect()->route('book.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('show', compact('book'));
    }


    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('book.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')
            ->with('success', 'Book deleted successfully.');
    }
}
