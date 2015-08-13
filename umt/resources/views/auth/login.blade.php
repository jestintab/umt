
@extends('welcome.master')
@section('title', 'Login - Up My Trash')


@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
@if(Session::has('error'))
<div class="alert-box success">
  <h2>{{ Session::get('error') }}</h2>
</div>
@endif
	
<form method="POST" action="{{ url('/auth/login') }}" class="col-md-6">
    {!! csrf_field() !!}

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div  class="form-group">
       
    
        <input type="checkbox" name="remember"> Remember Me
    
    </div>

    <div  class="form-group"> 
        <button type="submit">Register</button>
    </div>
</form>
    
   
    </div>
@endsection