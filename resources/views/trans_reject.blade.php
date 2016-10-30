@extends('layouts.dashboard')

@section('title')
	Gas Batik - Reject
@endsection

@section('dash_sub')
	collapse
@endsection

@section('item_sub')
	collapse
@endsection

@section('trans_sub')
	collapse
@endsection

@section('trans_reject')
	active
@endsection

@section('css')
	<link href="{{ env('APP_URL') }}/resources/assets/css/plugins/select2/select2.css" rel="stylesheet">
@endsection

@section('content')
		<h1 class="page-title">Reject Transaction</h1>
		<!-- Breadcrumb -->
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a href="{{ env('APP_URL') }}/public/home"><i class="fa fa-home"></i>Home</a></li> 
			<li><a href="{{ env('APP_URL') }}/public/trans_data">Transaction</a></li> 
			<li class="active">Reject</li> 
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
						@if (isset($trans_items))
						<div class="form-group">
				          <label class="label_fn control-label" >Customer :</label>
				          <input id="cust_name" name="cust_name" type="text" placeholder="{{ $trans_items->customer }}" class="input_fn form-control" disabled>
				        </div>
				        <div class="form-group">
				          <label class="label_fn control-label" >Date :</label>
				          <input id="cust_name" name="trans_date" type="text" placeholder="{{ $trans_items->trans_date }}" class="input_fn form-control" disabled>
				        </div>
				        <div class="form-group">
				          <label class="label_fn control-label" >Total :</label>
				          <input id="cust_name" name="total" type="text" placeholder="{{ $trans_items->total }}" class="input_fn form-control" disabled>
				        </div>
							<form method="post" action="{{ env('APP_URL') }}/public/trans_reject" onsubmit="return confirm('Are you sure you want to submit?');">
								<table class="table table-striped table-bordered table-hover">
							    	<thead>
										<tr>
											<th>No</th>
											<th>Item</th>
											<th>Unit Price</th>
											<th>Qty</th>
											<th>Reject Qty</th>
										</tr>
									</thead>
									</tbody>
										<?php $loop = 1 ?>
										@foreach ($trans_items->items as $item)
							                <tr>
									        	<td>{{ $loop++ }}</td>
									            <td>{{ $item->code }}</td>
									            <td>{{ $item->pivot->unit_price }}</td>
									            <td>{{ $item->pivot->qty }}</td>
									            <td>
									            	<input type="number" class="form-control" name="{{ $item->id }}" value="0" max="{{ $item->pivot->qty }}" min="0" required>
									            </td>
									        </tr>
							            @endforeach
									</tbody>
								</table>
								<input type="hidden" name="id" value="{{ $trans_items->id }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							 	<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						@else
							<ul class="alert alert-danger" style="padding-left: 2em;">
						        Use Transaction Rejection from <a href="{{ env('APP_URL') }}/public/trans_data"><span class="title">Here</span></a>
						    </ul>	
						@endif
					</div>
				</div>
			</div>
		</div>
@endsection

	@section('script')
	<script src="{{ env('APP_URL') }}/resources/assets/js/plugins/select2/select2.full.min.js"></script>
	<script src="{{ env('APP_URL') }}/resources/assets/js/app/trans_reject.js"></script>
@endsection