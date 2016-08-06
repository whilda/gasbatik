@extends('layouts.dashboard')

@section('title')
	Gas Batik - Input Item
@endsection

@section('item')
	active
@endsection

@section('item_input')
	active
@endsection

@section('dash_sub')
	collapse
@endsection

@section('item_sub')
	
@endsection

@section('trans_sub')
	collapse
@endsection

@section('css')
	<link href="../resources/assets/css/plugins/select2/select2.css" rel="stylesheet">
@endsection

@section('content')
		<h1 class="page-title">Input Item</h1>
		<!-- Breadcrumb -->
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a href="./home"><i class="fa fa-home"></i>Home</a></li> 
			<li><a href="./item_data">Item</a></li> 
			<li class="active">Input</li> 
		</ol>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h3 class="panel-title">Form input</h3>
						<ul class="panel-tool-options"> 
							<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
							<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							<li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						@if ($errors->any())
						    <ul class="alert alert-danger" style="padding-left: 2em;">
						        @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
						    </ul>
						@endif
						@if (isset($success))
						    <div class="alert alert-success" style="padding-left: 2em;">
						        Data has been saved successfully
						    </div>
						@endif
						 <form method="post" action="./item_input" onsubmit="return confirm('Are you sure you want to submit?');">
							  <div class="form-group row">
							    <label for="inputEmail3" class="col-sm-2 form-control-label">Code</label>
							    <div class="col-sm-10">
							      <input type="text" value='@if($errors->any()){{ $inputs['code'] }}@endif' class="form-control" id="code" name="code" readonly="readonly">
							    </div>
							  </div>
							 <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 form-control-label">Vendor</label>
							    <div class="col-sm-10">			      
							      	<select class="form-control select2" id="vendor_id" name="vendor_id">
									  	<option value="-">-</option>
									  	@if ($vendors->count())
								            @foreach ($vendors as $vendor)
								                <option 
								                @if($errors->any())
								                	@if($inputs['vendor_id'] == $vendor->id)
								                		selected='selected'
								                	@endif	
								                @endif 
								                
								                value="{{ $vendor->id }}">{{ $vendor->name }}</option>
								            @endforeach
										@endif
									</select>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 form-control-label">Type</label>
							    <div class="col-sm-10">			      
							      	<select class="form-control select2" id="type_id" name="type_id">
									  	<option value="-">-</option>
									  	@if ($types->count())
								            @foreach ($types as $type)
								                <option 
								                @if($errors->any())
								                	@if($inputs['type_id'] == $type->id)
								                		selected='selected'
								                	@endif	
								                @endif 
								                
								                value="{{ $type->id }}">{{ $type->name }}</option>
								            @endforeach
										@endif
									</select>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 form-control-label">Material</label>
							    <div class="col-sm-10">			      
							      	<select class="form-control select2" id="material_id" name="material_id">
									  	<option value="-">-</option>
									  	@if ($materials->count())
								            @foreach ($materials as $material)
								                <option 
								                @if($errors->any())
								                	@if($inputs['material_id'] == $material->id)
								                		selected='selected'
								                	@endif	
								                @endif 
								                
								                value="{{ $material->id }}">{{ $material->name }}</option>
								            @endforeach
										@endif
									</select>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 form-control-label">Note</label>
							    <div class="col-sm-10">
							      <input type="text" value='@if ($errors->any()){{ $inputs['note'] }}@endif' class="form-control" id="note" name="note" placeholder="Note">  
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 form-control-label">Purchase Price</label>
							    <div class="col-sm-10">
							      <div class="input-group">
									  <span class="input-group-addon">Rp</span>
									  <input type="number" value='@if ($errors->any()){{ $inputs['purchase_price'] }}@endif' class="form-control" id="purchase_price" name="purchase_price" placeholder="Amount">
									</div>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 form-control-label">Sell Price</label>
							    <div class="col-sm-10">
							      <div class="input-group">
									  <span class="input-group-addon">Rp</span>
									  <input type="number" value='@if ($errors->any()){{ $inputs['sell_price'] }}@endif' class="form-control" id="sell_price" name="sell_price" placeholder="Amount">
									</div>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="inputPassword3" class="col-sm-2 form-control-label">Quantity</label>
							    <div class="col-sm-10">
							      <input type="number" value='@if ($errors->any()){{ $inputs['quantity'] }}@endif' class="form-control" id="quantity" name="quantity" placeholder="Quantity">
							    </div>
							  </div>
							  <input type="hidden" name="_token" value="{{ csrf_token() }}">
							  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
						@if ($errors->any())
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
@endsection

	@section('script')
	<script src="../resources/assets/js/plugins/select2/select2.full.min.js"></script>
	<script src="../resources/assets/js/app/item_input.js"></script>
@endsection