@extends('welcome.master')
@section('title', 'Up My Trash - coming soon!')


@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	
</div>
    <p>We are buliding the site! Stay Connected! </p>
     
    <form action="{{ url('subscribe') }}" method="POST" class="col-md-6" role="form">
    	<legend>Form title</legend>
		
        
			@if (session('status'))
			    <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        {{ session('status') }}
			    </div>  
			@endif
            
	 
    	<div class="form-group  @if ($errors->has('email')) has-error @endif">
    		<label for="">Email</label>
    		<input type="text" class="form-control" value="{{ Input::old('email') }}" name="email" placeholder="Enter your email!">
    		@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
    	</div>
    	<div class="form-group  @if ($errors->has('place')) has-error @endif">
    		<label for="">Place</label>
    		<select name="place" class="form-control">
    			<option value="{{ Input::old('place') }}" disabled selected>Select an option</option>
    			<option value="tvm">Thiruvanthapuram</option>
    			<option value="klm">Kollam</option>
    			<option value="pta">Pathanamthitta</option>
    			<option value="apy">Alappuzha</option>

    		</select>
    		@if ($errors->has('place')) <p class="help-block">{{ $errors->first('place') }}</p> @endif
    	</div>
    	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    	
    
    	<button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
    </div>
@endsection