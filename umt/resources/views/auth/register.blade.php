@extends('welcome.master')
@section('title', 'Register - Up My Trash')


@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
@if(Session::has('error'))
<div class="alert-box success">
  <h2>{{ Session::get('error') }}</h2>
</div>
@endif
	
<form method="POST" action="{{ url('/auth/register') }}" class="col-md-6">
    {!! csrf_field() !!}

    <div class="form-group">
        <label>Name</label>
        <input type="text"  name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div  class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">
    </div>

    <div  class="form-group"> 
        <button type="submit">Register</button>
    </div>
</form>
    
   
    </div>
@endsection