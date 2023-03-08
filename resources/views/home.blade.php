@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <a href="{{route('categories.index')}}" class="d-block btn btn-primary my-2">Categories</a>
            <a href="{{route('books.index')}}" class="d-block btn btn-primary my-2">Books</a>
        </div>
        <div class="col-10"></div>
    </div>
</div>
@endsection
