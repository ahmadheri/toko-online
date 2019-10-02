@extends('layouts.global')

@section('title') Create Categories @endsection

@section('pageTitle') Create Categories @endsection

@section('content')

<div class="col-md-8">
   <form 
      enctype="multipart/form-data"
      class="bg-white shadow-sm p-3"
      action="{{ route('categories.store') }}"
      method="POST">

      @csrf

      <label for="">Category name</label>
      <input 
         type="text"
         class="form-control"
         name="name">
      <br>

      <label for="">Category Image</label>
      <input 
         type="file"
         class="form-control"
         name="image">
      <br>

      <input 
         type="submit"
         class="btn btn-primary"
         value="Save">
   
   </form>
</div>

@endsection