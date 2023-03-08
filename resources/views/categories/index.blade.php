@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Categories Management</h3>
        <a href="{{route('categories.create')}}" class="btn btn-primary my-2">add Category</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories  as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td><a href="{{ route('categories.edit' , ['category' => $category]) }}" class="btn btn-primary">edit</a> | 
                        <a href="{{ route('categories.show' , ['category' => $category]) }}"  class="btn btn-success">view</a> |

                        <form action="{{ route('categories.destroy' , ['category' => $category]) }}" method="post" onsubmit="return confirm('delete {{ $category->name }}')" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form> 

                        </td>                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection