@extends('layout.main')

@section('content')
<div class="container push-down-30">
	<div class="row">
		<div class="col-md-12">
			<h1> Categories Admin Panel </h1>
			<p> Manage your categories </p>
			<h5><span class="light">Categoreies</span> </h5>

			@if (session('message'))
			    <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        {{ session('message') }}
			    </div>  
			@endif
			
			<table class="table table-theme table-striped">
				<thead>
					<tr>
						<th>Categories</th>
						<th >Options</th>
					</tr>
				</thead>
				<tbody>
					<tr>

						@foreach($categories as $category)
						<tr>

							<td> {{ $category->name  }} </td>
							<td > 	{!! Form::open( array('url' => 'admin/categories/delete', 'class' => 'form-inline')) !!}
								{!! Form::hidden('id' ,$category->id ) !!}
								{!! Form::submit('Delete',array('class' => 'btn btn-primary')) !!}
								{!! Form::close() !!}

							</td>
						</tr>
						@endforeach	
					</tbody>
				</table>

			</div><!---end admin-->

			<h2> Create New Category </h2>

			@if(Session::has('error'))
			<div class="alert-box success">
				<h2>{{ Session::get('error') }}</h2>
			</div>
			@endif
			<div class="col-md-6">

				{!! Form::open(array('url'=>'admin/categories/create')) !!}	
				<div class="form-group">
					{!! Form::label('name') !!}
					{!! Form::text('name','',array('class' => 'form-control form-control--contact')) !!}
				</div>
				{!! Form::submit('Create Category', array('class'=>'btn btn-primary')) !!}
				{!! Form::close() !!}

			</div>
		</div>
	</div>
	@stop