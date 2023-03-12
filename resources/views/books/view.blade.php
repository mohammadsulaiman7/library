@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <h3> كتب {{ $category->name }}  </h3>
        <ul>
            @foreach ($category->books as  $book)
               <li>{{ $book->title }}</li> 
            @endforeach            
        </ul>
           
        </div>
    </div>
@endsection
