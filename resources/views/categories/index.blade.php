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
               placeholder="Filter by category name..."
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
   </div>

   <hr class="my-3">

   @if(session('status'))
      <div class="alert alert-success">
         {{session('status')}}
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
                     Todo actions
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