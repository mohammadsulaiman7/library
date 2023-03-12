@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>books Management</h3>
        <a href="{{route('books.create')}}" class="btn btn-primary my-2">add book</a>
        {{ $books->links('pagination::bootstrap-5') }}
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ISBN</td>
                    <td>title</td>
                    <td>price</td>
                    <td>mortgage</td>
                    <td>category</td>
                    <td>actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($books  as $book)
                    <tr>
                        <td>{{$book->ISBN}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->price}}</td>
                        <td>{{$book->mortgage}}</td>
                        <td>{{$book->category->name}}</td>
                        <td>
                        <a href="{{ route('books.edit' , ['book' => $book]) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a> | 
                        <a href="{{ route('books.show' , ['book' => $book]) }}"  class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a> |

                        <form action="{{ route('books.destroy' , ['book' => $book]) }}" method="post" onsubmit="return confirm('delete {{ $book->title }}?')" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>                            
                        </form> 

                        </td>                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection