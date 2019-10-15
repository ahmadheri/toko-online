@extends('layouts.global')

@section('title') Create User @endsection

@section('content')

   <div class="col-md-8">

      @if(session('status'))
         <div class="alert alert-success">
            {{ session('status') }}
         </div>
      @endif

      <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm p-3">
      @csrf
      <label for="name">Name</label>
      <input value="{{ old('name') }}" type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Full Name">
      <div class="invalid-feedback">
         {{ $errors->first('name')}}
      </div>
      <br>

      <label for="username">Username</label>
      <input value="{{ old('username') }}" type="text" class="form-control {{ $errors->first('username') ? 'is-invalid' : '' }} " name="username" id="username" placeholder="username">
      <div class="invalid-feedback">
         {{ $errors->first('username') }}
      </div>
      <br>

      {{-- 
         MENAMBAHKAN INI UNTUK MENGECEK CHECKBOX
         {{ (is_array(old('roles')) && in_array('ADMIN', old('roles'))) ? 'checked' : ''}} 
      --}}
      <label for="">Roles</label> <br>
      <input class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}" type="checkbox" name="roles[]" id="ADMIN" value="ADMIN" {{ (is_array(old('roles')) && in_array('ADMIN', old('roles'))) ? 'checked' : ''}}>
      <label for="ADMIN">Administrator</label>
      <input class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}" type="checkbox" name="roles[]" id="STAFF" value="STAFF" {{ (is_array(old('roles')) && in_array('STAFF', old('roles'))) ? 'checked' : ''}}>
      <label for="STAFF">Staff</label>
      <input class="form-control {{ $errors->first('roles') ? 'is-invalid' : '' }}" type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER" {{ (is_array(old('roles')) && in_array('CUSTOMER', old('roles'))) ? 'checked' : ''}}>
      <label for="CUSTOMER">Customer</label>
      <div class="invalid-feedback">
         {{ $errors->first('roles') }}
      </div>
      <br>

      <label for="phone">Phone number</label> <br>
      <input value="{{ old('phone') }}" type="text" name="phone" class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}">
      <div class="invalid-feedback">
         {{ $errors->first('phone') }}
      </div>
      <br>

      <label for="address">Address</label>
      <textarea name="address" id="address" class="form-control {{ $errors->first('address') ? 'is-invalid' : '' }}">{{ old('address') }}</textarea>
      <div class="invalid-feedback">
         {{ $errors->first('address') }}
      </div>
      <br>

      <label for="avatar">Avatar image</label> <br>
      <input value="{{ old('avatar') }}" type="file" name="avatar" id="avatar" class="form-control {{ $errors->first('avatar') ? 'is-invalid' : '' }}">
      <div class="invalid-feedback">
         {{ $errors->first('avatar') }}
      </div>

      <hr class="my-3">

      <label for="email">Email</label>
      <input value="{{ old('email') }}" type="text" class="form-control {{ $errors->first('email') ? 'is-invalid': '' }}" name="email" id="email" placeholder="user@mail.com">
      <div class="invalid-feedback">
         {{$errors->first('email')}}
      </div>
      <br>

      <label for="password">Password</label>
      <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : ''}} " name="password" id="password" placeholder="password">
      <div class="invalid-feedback">
         {{ $errors->first('password') }}
      </div>
      <br>

      <label for="password_confirmation">Password Confirmation</label>
      <input type="password" class="form-control {{ $errors->first('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation" id="password_confirmation" placeholder="password confirmation">
      <div class="invalid-feedback">
            {{ $errors->first('password_confirmation') }}
         </div>
      <br>

      <input type="submit" class="btn btn-primary" value="Save">

      </form>
   </div>

@endsection
