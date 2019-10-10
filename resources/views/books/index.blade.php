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

   index books

   {{-- <div class="row">
      <div class="col-md-12">
         <table class="table table-bordered table-stripped">
            <thead>
               <tr>
                  <th></th>
               </tr>
            </thead>
         </table>
      </div>
   </div> --}}

@endsection