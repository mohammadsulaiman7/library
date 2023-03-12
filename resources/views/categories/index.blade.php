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
                        <td><a href="{{ route('categories.edit' , ['category' => $category]) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a> | 
                        <a href="{{ route('categories.show' , ['category' => $category]) }}"  class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a> |

                        <form action="{{ route('categories.destroy' , ['category' => $category]) }}" method="post" onsubmit="return confirm('delete {{ $category->name }}')" class="d-inline-block">
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