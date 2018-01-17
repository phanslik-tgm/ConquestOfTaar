@extends('layouts.master')

@section('title')
Welcome!
@endsection

@section('content')
@if(count($errors) > 0)
<div class="row">
  <div class="col-md-6">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif
<div class="row">
<div class="col-md-6">
  <h3>Register</h3>
<form action="{{ route('signup') }}" method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{Request::old('email')}}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else. Or do we?</small>
  </div>
  <div class="form-group">
    <label for="username">Userame</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{Request::old('username')}}">
  </div>
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{Request::old('first_name')}}">
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{Request::old('last_name')}}">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{Request::old('password')}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <input name="_token" type="hidden" value="{{ csrf_token() }}" />
</form>
</div>

<div class="col-md-6">
    <h3>Sign In</h3>
<form action="{{ route('signin') }}" method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{Request::old('email')}}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else. Or do we?</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{Request::old('password')}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <input name="_token" type="hidden" value="{{ csrf_token() }}" />
</form>
</div>
</div>
@endsection
