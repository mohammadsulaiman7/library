@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <h3>Add Category </h3>
            <form action="{{route('categories.store')}}" method="post" class="col-md-6 offset-md-3">
                @csrf
                <h4>Add Category </h4>
                <input type="text" name="name" placeholder="category name" maxlength="50" class="form-control my-2">
                <input type="submit" value="add category" class="btn btn-primary my-2">
            </form>
        </div>
    </div>
@endsection
