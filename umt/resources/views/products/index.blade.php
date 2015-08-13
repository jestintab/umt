@extends('layout.main')

@section('content')
<div class="container push-down-30">
	<div class="row">
		<div class="col-md-12">
			<h1> Products Admin Panel </h1>
			<p> Manage your products </p>
			<h5><span class="light">Products</span> </h5>

			@if (session('message'))
			    <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        {{ session('message') }}
			    </div>  
			@endif
			 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

			<table class="table table-theme table-striped">
				<thead>
					<tr>
						<th>Products</th>
						<th >Options</th>
					</tr>
				</thead>
				<tbody>
					<tr>

						@foreach($products as $product)
						<tr>

							<td> {!! $product->title  !!} </td>
							<td> {!! Html::image($product->image, $product->title,array('width' =>'50')) !!}
							<td>
							{!! Form::open( array('url' => 'admin/products/delete')) !!}
								{!! Form::hidden('id' ,$product->id ) !!}
								{!! Form::submit('Delete',array('class' => 'btn btn-primary')) !!}
								{!! Form::close()  !!}

							</td>
							<td>
							{!! Form::open(array('url' => 'admin/products/toggleavailiablity' ))!!}
							{!! Form::hidden('id', $product->id) !!}
							{!! Form::select('availability', array('1' => 'In stock','0'=> 'Out of stock'),$product->availability,array('class' => 'form-control form-control--contact')) !!}

							{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
							{!! Form::close() !!}
							</td>

						</tr>
						@endforeach	
					</tbody>
				</table>

			</div><!---end admin-->

			<h2> Create New Product </h2>

			@if(Session::has('error'))
			<div class="alert-box success">
				<h2>{{ Session::get('error') }}</h2>
			</div>
			@endif
			<div class="col-md-6">

				{!! Form::open(array('url'=>'admin/products/create','files' => true)) !!}	
				<div class="form-group">
					{!! Form::label('category_id', 'Category') !!}
					{!! Form::select('category_id',$categories,null,array('class' => 'form-control form-control--contact'))!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('title')!!} 	
					{!! Form::text('title','',array('class' => 'form-control form-control--contact')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('description')!!} 	
					{!! Form::textarea('description','',array('class' => 'form-control form-control--contact')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('price')!!} 	
					{!! Form::text('price','',array('class' => 'form-control form-control--contact')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('image','Choose an image')!!} 	
					{!! Form::file('image') !!}
				</div>

				{!! Form::submit('Create Product', array('class'=>'btn btn-primary')) !!}
				{!! Form::close() !!}

			</div>
		</div>
	</div>
	@stop