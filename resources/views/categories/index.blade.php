@extends('layouts.global')

@section('title') Index Category @endsection

@section('pageTitle') List Category @endsection

@section('content')
    
   <div class="row">
      <div class="col-md-6">
         <form action="{{ route('categories.index') }}">
            <div class="input-group">
               <input
                  type="text"
                  class="form-control"
                  placeholder="Filter by category name"
                  value="{{Request::get('name')}}"
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
               <a class="nav-link active" href="{{route('categories.index')}}">Published</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('categories.trash')}}">Trash</a>
            </li>
         </ul>
      </div>
   </div>

   <hr class="my-3">

   @if(session('status'))
      <div class="alert alert-success alert-dismissible fade show">
         {{session('status')}}
      </div>
   @endif

   @if(session('status-warning'))
      <div class="alert alert-warning alert-dismissible fade show">
         {{session('status-warning')}}
      </div>
   @endif

   <div class="row">
      <div class="col-md-12 text-right">
         <a href="{{route('categories.create')}}" class="btn btn-primary my-2">Create Category</a>  
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <table class="table table-bordered table-stripped">
         <thead>
            <tr>
               <th><b>Name</b></th>
               <th><b>Slug</b></th>
               <th><b>Image</b></th>
               <th><b>Actions</b></th>
            </tr>
         </thead>
         <tbody>
            @foreach ($categories as $category)
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>
                     @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="gambar_category" width="48px">
                     @else 
                        No Image
                     @endif
                  </td>
                  <td>
                     <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                     <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-success btn-sm">Edit</a>

                     <form action="{{ route('categories.destroy', $category->id) }}"
                        class="d-inline"
                        method="POST"
                        onsubmit="return confirm('Move category to trash ?')">

                        @csrf

                        <input type="hidden" 
                           value="DELETE"   
                           name="_method">

                        <input type="submit"
                           class="btn btn-danger btn-sm"
                           value="Trash">

                     </form>
                     
                  </td>
                </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
               <td colspan="5">
                  {{$categories->links()}}
               </td>
            </tr>
         </tfoot>
         </table>
      </div>
   </div>
   

@endsection