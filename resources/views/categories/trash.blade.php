@extends('layouts.global')

@section('title') Trash Category @endsection

@section('pageTitle') Trash Categories @endsection

@section('content')

   <div class="row">
      <div class="col-md-6">
         <form action="{{ route('categories.index') }}">
            <div class="input-group">
               <input 
                  type="text"
                  class="form-control"
                  placeholder="Filter by category name"
                  value="{{ Request::get('name') }}"
                  name="name">

               <div class="input-group-append">
                  <input 
                     type="submit"
                     value="Filter"
                     class="btn btn-primary">
               </div>
            </div>
         </form>
      </div>

      <div class="col-md-6">
         <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
               <a href="{{ route('categories.index') }}" class="nav-link">Published</a>
            </li>
            <li class="nav-item">
               <a href="{{ route('categories.trash') }}" class="nav-link active">Trash</a>
            </li>
         </ul>
      </div>
   </div>   
   
   <hr class="my-3">

   <div class="row">
      <div class="col-md-12">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Nama</th>
                  <th>Slug</th>
                  <th>Image</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($categories as $category)
               <tr>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>
                     @if($category->image)
                     <img src="{{ asset('storage/' . $category->image) }}" alt="gambar" width="48px">
                     @endif
                  </td>
                  <td>
                     <a href="{{ route('categories.restore', $category->id) }}" class="btn btn-success btn-sm">Restore</a>
                     <form 
                        class="d-inline"
                        action="{{ route('categories.delete-permanent', $category->id) }}"
                        method="POST"
                        onsubmit="return confirm('Delete this category permanently?')">

                        @csrf

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                     
                     </form>
                  
                  </td>
                  
               </tr>
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="5">
                     {{ $categories->links() }}
                  </td>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>

   

@endsection