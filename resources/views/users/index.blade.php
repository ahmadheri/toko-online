@extends('layouts.global');

@section('title') Users list @endsection

@section('content')

   <table class="table table-bordered">

      @if(session('status'))
         <div class="alert alert-success">
            {{session('status')}}
         </div>
      @endif

      <a href="{{route('users.create')}}" class="btn btn-primary my-2 float-sm-right">Tambah Data</a>

      <thead>
         <tr>
            <th><b>Name</b></th>
            <th><b>Username</b></th>
            <th><b>Email</b></th>
            <th><b>Avatar</b></th>
            <th><b>Action</b></th>
         </tr>
      </thead>
      <tbody>
         @foreach($users as $user)
         <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
               @if($user->avatar)
                  <img src="{{asset('storage/'.$user->avatar)}}" width="70px">
               @else
                  N/A
               @endif

            </td>
            <td>
               <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
               <form 
                  action="{{ route('users.destroy', $user->id)}}"
                  class="d-inline"
                  onsubmit="return confirm('Delete this user permanently?')"
                  method="POST">

                  @csrf

                  <input 
                     type="hidden"
                     name="_method"
                     value="DELETE">
                  
                  <input 
                     type="submit"
                     value="Delete"
                     class="btn btn-danger btn-sm">

               </form>
            </td>
            
               
            
         </tr>
         @endforeach
      </tbody>
   </table>

@endsection