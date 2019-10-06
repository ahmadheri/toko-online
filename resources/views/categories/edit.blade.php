@extends('layouts.global')

@section('title') Edit Category @endsection

@section('pageTitle') Edit Category @endsection

@section('content')

   <div class="col-md-8">
      <form 
         action="{{ route('categories.update', $category->id) }}"
         enctype="multipart/form-data"
         method="POST"
         class="bg-white shadow-sm p-3">

         @csrf

         <input 
            type="hidden"
            value="PUT"
            name="_method">

            <label>Category name</label> <br>
            <input
               type="text"
               class="form-control"
               value="{{$category->name}}"
               name="name">
            <br>
      
            <label>Category slug</label>
            <input
               type="text"
               class="form-control"
               value="{{$category->slug}}"
               name="slug">
            <br>

            @if($category->image)
               <span>Current image</span> <br>
               <img src="{{ asset('storage/' . $category->image) }}" alt="gambar-category" width="120px">
               <br>
            @endif

            <input 
               type="file"
               name="image"
               class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <br><br>

            <input type="submit" class="btn btn-primary" value="Update">
            

      </form>

      

   </div>


@endsection