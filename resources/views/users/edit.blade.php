@extends('layouts.global')

@section('title') Edit User @endsection

@section('content')

<div class="col-md-8">

   @if(session('status'))
      <div class="alert alert-success">
         {{session('status')}}
      </div>
   @endif

   <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="bg-white shadow-sm p-3" method="POST">
      @csrf
      <input type="hidden" value="PUT" name="_method">

      <label for="name">Name</label>
      <input 
         {{ old('name') }}
         type="text" 
         class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" 
         name="name" 
         id="name" 
         placeholder="Full Name" 
         value="{{ $user->name }}">
      <div class="invalid-feedback">
         {{ $errors->first('name') }}
      </div>
      <br>

      <label for="username">Username</label>
      <input 
         type="text" 
         class="form-control" 
         name="username" 
         id="username" 
         placeholder="Username" 
         value="{{ $user->username }}" disabled>
      <br>

      <label for="">Status</label>
      <br>
      <input {{ $user->status == "ACTIVE" ? 'checked' : '' }} value="ACTIVE" type="radio" class="form-control" name="status" id="active">
      <label for="active">Active</label>

      <input {{ $user->status == "INACTIVE" ? 'checked' : '' }} value="INACTIVE" type="radio" class="form-control" name="status" id="inactive">
      <label for="inactive">Inactive</label>

      <br>

      <label for="">Roles</label> <br>
      <input 
         type="checkbox" 
         {{ in_array("ADMIN", json_decode($user->roles)) ? 'checked' : '' }}
         name="roles[]" 
         class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}"
         id="ADMIN" 
         value="ADMIN">
      <label for="ADMIN">Administrator</label>

      <input 
         type="checkbox" 
         {{ in_array("STAFF", json_decode($user->roles)) ? 'checked' : '' }}
         name="roles[]" 
         class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}"
         id="STAFF" 
         value="STAFF">
      <label for="STAFF">Staff</label>
         
      <input 
         type="checkbox" 
         {{ in_array("CUSTOMER", json_decode($user->roles)) ? 'checked' : '' }}
         name="roles[]" 
         class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}"
         id="CUSTOMER" 
         value="CUSTOMER">
      <label for="CUSTOMER">Customer</label>
      <div class="invalid-feedback">
         {{ $errors->first('roles') }}
      </div>

      <br>

      <label for="phone">Phone number</label>
      <input 
         type="text" 
         name="phone"
         class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}"
         value="{{ $user->phone }}">
      <div class="invalid-feedback">
         {{ $errors->first('phone') }}
      </div>
      <br>
      
      <label for="address">Address</label>
      <textarea 
         name="address"
         id="address"
         class="form-control {{ $errors->first('address') ? 'is-invalid' : '' }}"
         >{{ old('address') ? old('address') : $user->address }}
      </textarea>
      <div class="invalid-feedback">
         {{ $errors->first('address') }}
      </div>
      <br>

      <label for="avatar">Avatar</label>
      <br>
      Current avatar: <br>
      @if($user->avatar)
         <img src="{{ asset('storage/' . $user->avatar) }}"
         width="120px">

         <br>
      @else
         No avatar
      @endif

      <input 
         type="file" 
         name="avatar" 
         id="avatar" 
         class="form-control">
      <small
         class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>

      <hr class="my-3">

      <label for="email">Email</label>
      <input
         value="{{$user->email}}"
         disabled
         class="form-control"
         placeholder="user@mail.com"
         type="text"
         name="email"
         id="email"/>
      <br>

      <input type="submit" class="btn btn-primary" value="Save">

   
   </form>
</div>
@endsection