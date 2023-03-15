@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-6 offset-3">
            
            <img class="w-100" src="{{asset( 'storage/book-images/' . $book->cover) }}" alt="{{asset( 'storage/book-images/' . $book->cover) }}">
            @foreach ($book->authors as $author)
                <p class="text-center m-2">{{ $author->name }}</p>
            @endforeach
        </div>
        </div>
    </div>
@endsection
