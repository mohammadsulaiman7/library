@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <h3>Edit Category </h3>
            <form action="{{route('categories.update' , ['category' => $category])}}" method="post" class="col-md-6 offset-md-3">
                @csrf
                @method('put')
                <h4>Add Category </h4>
                <input type="text" name="name" value="{{ $category->name }}" placeholder="category name" maxlength="50" class="form-control my-2">
                <div class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <input type="submit" value="save category" class="btn btn-primary my-2">
                <input type="reset" value="تصفير" class="btn btn-outline-primary my-2">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary my-2">تراجع</a>
            </form>
        </div>
    </div>
@endsection
