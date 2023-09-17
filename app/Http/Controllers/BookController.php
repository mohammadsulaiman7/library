<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $authors = Author::get();
        return view('books.create' , compact('categories' , 'authors'));
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
            'ISBN' => 'required|integer|unique:books',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'image|mimes:jpg,png,jpeg|max:10000'
        ]);
        $book = Book::create($request->all()); // not requiered
        if ($book)
        {
            $authors= $request->authors;
            $book->authors()->attach($authors);
            if ($request->has('cover')) {
                $coverFile = $request->file('cover');
                $fileName = $book->ISBN . '.' .  $coverFile->extension();
                // $coverFile->storeAs('public/book-images' ,  $fileName);
                $coverFile->storeAs('book-images' ,  $fileName , 'public');
                $book->cover = $fileName;
            }
            else
                $book->cover = 'no-image.png';
            $book->save();

            return redirect()->route('books.index')->with('success', 'book saved successfully');
        }
        else
            return  back()->with('error',  "error in adding book");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.view', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::get();
        $authors = Author::get();
        $authorIds = $book->authors->modelKeys();
        return view('books.edit', compact('book'  , 'categories' , 'authors', 'authorIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'ISBN' => 'required|integer|unique:books,ISBN,' . $book->ISBN . ',ISBN',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'image|mimes:jpg,png,jpeg|max:10000'
    ]);
    if ($book->update($request->all())) {
        $authors= $request->authors;
        $book->authors()->sync($authors);
        if ($request->has('cover')) {
            $coverFile = $request->file('cover');
            $fileName = $book->ISBN . '.' .  $coverFile->extension();
            // $coverFile->storeAs('public/book-images' ,  $fileName);
            Storage::putFileAs('public/book-images' , $coverFile , $fileName );
            $book->cover = $fileName;
            $book->save();
        }        

        return redirect()->route('books.index')->with('success', 'book saved successfully');
    }
    else
        return  back()->with('error',  "error in adding book");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {    
        $coverFile =  'public/book-images/' . $book->cover ;    
        if ($book->delete()) {
            Storage::delete($coverFile);
            return redirect()->route('books.index')->with('success', 'book deleted successfully');
        }
        else
            return  back()->with('error',  "error in deleting book");
    }
}
