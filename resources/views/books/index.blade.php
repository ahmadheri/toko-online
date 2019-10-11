@extends('layouts.global')

@section('title') List Books @endsection

@section('pageTitle') List Books @endsection

@section('content')

   
   @if(session('status'))
   <div class="alert alert-success alert-dismissible fade show">
      {{session('status')}}
   </div>
   @endif

   <div class="row">
      <div class="col-md-12 text-right">
         <a href="{{route('books.create')}}" class="btn btn-primary my-2">Create Book</a>  
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <table class="table table-bordered table-stripped">
            <thead>
               <tr>
                  <th><b>Cover</b></th>
                  <th><b>Title</b></th>
                  <th><b>Author</b></th>
                  <th><b>Status</b></th>
                  <th><b>Categories</b></th>
                  <th><b>Stock</b></th>
                  <th><b>Price</b></th>
                  <th><b>Action</b></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($books as $book)
                  <tr>
                     <td>
                        @if($book->cover)
                           <img src="{{ asset('storage/' . $book->cover) }}" width="96px">
                        @endif
                     </td>
                     <td>{{ $book->title }}</td>
                     <td>{{ $book->author }}</td>
                     <td>
                        @if($book->status == 'DRAFT')
                           <span class="badge bg-dark text-white">{{ $book->status }}</span>
                        @else 
                           <span class="badge badge-success">{{ $book->status }}</span>
                        @endif
                     </td>
                     <td>
                        <ul class="pl-3">
                           @foreach($book->categories as $category)
                              <li>{{ $category->name }}</li>
                           @endforeach
                        </ul>
                     </td>
                     <td>{{ $book->stock }}</td>
                     <td>{{ $book->price }}</td>
                     <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info btn-sm">Edit</a>

                        <form action="{{ route('books.destroy', $book->id) }}"
                           method="POST"
                           class="d-inline"
                           onsubmit="return confirm('Move book to trash?')">

                           @csrf

                           <input type="hidden"
                              name="_method"
                              value="DELETE">

                           <input type="submit"
                              class="btn btn-danger btn-sm"
                              value="Trash">
                        </form>

                     </td>
                  </tr>    
               @endforeach
               

            </tbody>
         </table>
      </div>
   </div>

@endsection