@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Add book </h3>
            <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data" class="col-md-6 offset-md-3">
                @csrf
                <h4>Add book </h4>
                <input type="text" name="ISBN" placeholder="book ISBN" maxlength="13" minlength="13" pattern="[0-9]{13}"
                    class="form-control my-2" required>
                <div class="text-danger">
                    @error('ISBN')
                        {{ $message }}
                    @enderror
                </div>
                <input type="text" name="title" placeholder="book title" maxlength="255" class="form-control my-2">
                <div class="text-danger">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
                <input type="number" name="price" placeholder="book price" step="0.01" min="0" max="99999999"
                    class="form-control my-2">

                <input type="number" name="mortgage" placeholder="book mortgage" step="0.01" min="0"
                    max="99999999" class="form-control my-2">


                <select multiple name="authors[]" class="ui search selection dropdown">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>

                <select name="category_id" class="form-control  my-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="text-danger">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>

                <img class="w-50" id="imgPreview" src="" alt="">
                <input type="file" id="cover" name="cover" class="form-control my-2" accept="image/*">

                <input type="submit" value="add book" class="btn btn-primary my-2">
                <input type="reset" value="تصفير" class="btn btn-outline-primary my-2">
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary my-2">تراجع</a>
            </form>
        </div>
    </div>
    <script>
        //multiple select with search filter
        $('.ui.dropdown').dropdown();
        //reload selected img
        $(document).ready(() => {
            $('#cover').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
