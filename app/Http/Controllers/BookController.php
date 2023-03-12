<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->paginate(6);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('books.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ISBN' => 'required|integer',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);
        
        if (Book::create($request->all()))
            return redirect()->route('books.index')->with('success', 'book saved successfully');
        else
            return  back()->with('error',  "error in adding book");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return view('books.view', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        $categories = Category::get();
        return view('books.edit', compact('book'  , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $request->validate([
            'ISBN' => 'required|integer',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);
        
        if ($book->update($request->all()) )
            return redirect()->route('books.index')->with('success', 'book saved successfully');
        else
            return  back()->with('error',  "error in updating book");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        if ($book->delete())
            return redirect()->route('books.index')->with('success', 'book deleted successfully');
        else
            return  back()->with('error',  "error in deleting book");
    }
}
