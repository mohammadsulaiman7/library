@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-6 offset-3">
            
            <img src="{{asset( 'storage/book-images/' . $book->cover) }}" alt="{{asset( 'storage/book-images/' . $book->cover) }}">
        </div>
        </div>
    </div>
@endsection
