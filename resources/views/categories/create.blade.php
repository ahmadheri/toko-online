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
         class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
         name="name"
         value="{{ old('name') }}">
      <div class="invalid-feedback">
         {{ $errors->first('name') }}
      </div>
      <br>

      <label for="">Category Image</label>
      <input 
         type="file"
         class="form-control {{ $errors->first('image') ? 'is-invalid' : '' }}"
         name="image">
      <div class="invalid-feedback">
         {{ $errors->first('image') }}
      </div>
      <br>

      <input 
         type="submit"
         class="btn btn-primary"
         value="Save">
   
   </form>
</div>

@endsection