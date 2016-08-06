@extends('layouts.dashboard')

@section('title')
	Gas Batik - Transaction Input
@endsection

@section('trans')
	active
@endsection

@section('trans_input')
	active
@endsection

@section('dash_sub')
	collapse
@endsection

@section('item_sub')
	collapse
@endsection

@section('trans_sub')
	
@endsection

@section('css')
	<link href="../resources/assets/css/plugins/select2/select2.css" rel="stylesheet">
	<link href="../resources/assets/css/plugins/datepicker/bootstrap-datepicker.css" rel="stylesheet">
@endsection

@section('content')
		<h1 class="page-title">Input Transaction</h1>
		<!-- Breadcrumb -->
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a href="./home"><i class="fa fa-home"></i>Home</a></li> 
			<li><a href="./trans_data">Transaction</a></li> 
			<li class="active">Input</li> 
		</ol>
		<div class="row">
			<div class="col-lg-8">
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
						@if (isset($success))
							<div class="alert alert-success" style="padding-left: 2em;">
					        Data has been saved successfully
					    </div>
						@endif
				      <form action="#" method="post" id="sign-up_area" role="form" onsubmit="return confirm('Are you sure you want to submit?');">
				        <legend>Transaction</legend>
				        <!-- Text input-->
				        <div class="form-group">
				          <label class="label_fn control-label" >Customer :</label>
				          <input id="cust_name" name="cust_name" type="text" placeholder="" class="input_fn form-control" required="">
				        </div>
				        <!-- Date input-->
				        <div class="form-group">
				          <label class="label_fn control-label" >Date :</label>
				          <div id="date-popup" class="input-group date"> 
								<input id="trans_date" name="trans_date" type="text" data-format="yyyy-MM-dd" class="form-control" required=""> 
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
							</div>
				        </div>
				        <!-- Header Table -->
				        <div class="row">
					        <div align="center" class="form-group col-md-1">
					          <label style="padding-top: 5px;font-size: large;">No</label>
					        </div>
					        <div align="center" class="form-group col-md-3">
					          <label style="padding-top: 5px;font-size: large;">Item</label>
					        </div>
					        <div align="center" class="form-group col-md-2">
					          <label style="padding-top: 5px;font-size: large;">Unit</label>
					        </div>
					       	<div align="center" class="form-group col-md-2">
					          <label style="padding-top: 5px;font-size: large;">Note</label>
					        </div>
					        <div align="center" class="form-group col-md-2">
					          <label style="padding-top: 5px;font-size: large;">Unit Price</label>
					        </div>
					        <div align="center" class="form-group col-md-2">
					          <label style="padding-top: 5px;font-size: large;">Sum</label>
					        </div>
				        </div> <!-- End of header table -->
				        
				        <!-- Entry -->
				        <div id="entry1" class="clonedInput">
				          <fieldset style="border:none;">
				          
					      	<!-- Text input-->
					      	<div class="form-group col-md-1">
					          <label id="reference" name="reference" class="heading-reference" style="padding-top: 5px;font-size: large;">1</label>
					        </div>
					        
					        <!-- Select Basic -->
					        <div class="form-group col-md-3">
					            <select class="select_item form-control" name="ID1_item" id="ID1_item" onchange="set_price(1)">
					              <option value="" selected="selected" disabled="disabled">Select item code</option>
					              @if ($items->count())
							            @foreach ($items as $item)
							                <option 
							                @if($errors->any())
							                	@if($inputs['item_id'] == $item->id)
							                		selected='selected'
							                	@endif	
							                @endif 
							                
							                value="{{ $item->id }}">{{ $item->code }}</option>
							            @endforeach
									@endif
					            </select>
				          	</div>

							<!-- Number -->
					        <div class="form-group col-md-2">
					          <input id="ID1_qty" name="ID1_qty" type="number" class="input_qty form-control" required="" onchange="calc_total()" onkeyup="calc_total()">
					        </div>
					        
					        <!-- Text input-->
					        <div class="form-group col-md-2">
					          <input id="ID1_note" name="ID1_note" type="text" class="input_note form-control">
					        </div>
					        
					        <!-- Number -->
					        <div class="form-group col-md-2">
					          <input id="ID1_unit_price" name="ID1_unit_price" type="number" class="input_unit_price form-control" required="" onchange="calc_total()" onkeyup="calc_total()">
					        </div>

							<!-- Number -->
					        <div class="form-group col-md-2">
					          <input id="ID1_sum" name="ID1_sum" type="number" class="input_sum form-control" readonly="readonly">
					        </div>
				        </div><!-- end #entry1 -->

					        <div class="row" align="right">
					       		<label class="control-label col-md-10" style="font-size: large;">Total : Rp </label>
					       		<label id="trans_total" name="trans_total" class="control-label col-md-2" style="font-size: large;margin-left: -15px;">0</label>
					        </div>
					        
					        <!-- Hidden Input -->
					        <input type="hidden" id="num" name="num" val="1">
					        <input type="hidden" id="total" name="total">
					        <input type="hidden" name="_token" value="{{ csrf_token() }}">
					        
					        <!-- Button -->
					        <p>
					        <button class="btn btn-primary">Submit</button>
					        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">+</button>
					        <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">-</button>
					        </p>

				        </fieldset>
				        </form>
					</div>
				</div>
			</div>
		</div>
		<div style="visibility: hidden;">
			<!-- Entry -->
	        <div id="template">
	          <fieldset style="border:none;">
	          
		      	<!-- Text input-->
		      	<div class="form-group col-md-1">
		          <label id="reference" name="reference" class="heading-reference" style="padding-top: 5px;font-size: large;">1</label>
		        </div>
		        
		        <!-- Select Basic -->
		        <div class="form-group col-md-3">
		            <select class="select_item form-control" name="ID0_item" id="ID0_item" onchange="set_price(1)">
		              <option value="" selected="selected" disabled="disabled">Select item code</option>
		              @if ($items->count())
				            @foreach ($items as $item)
				                <option 
				                @if($errors->any())
				                	@if($inputs['item_id'] == $item->id)
				                		selected='selected'
				                	@endif	
				                @endif 
				                
				                value="{{ $item->id }}">{{ $item->code }}</option>
				            @endforeach
						@endif
		            </select>
	          	</div>

				<!-- Number -->
		        <div class="form-group col-md-2">
		          <input id="ID0_qty" name="ID0_qty" type="number" class="input_qty form-control" required="" onchange="calc_total()" onkeyup="calc_total()">
		        </div>
		        
		        <!-- Text input-->
		        <div class="form-group col-md-2">
		          <input id="ID0_note" name="ID0_note" type="text" class="input_note form-control">
		        </div>
		        
		        <!-- Number -->
		        <div class="form-group col-md-2">
		          <input id="ID0_unit_price" name="ID0_unit_price" type="number" class="input_unit_price form-control" required="" onchange="calc_total()" onkeyup="calc_total()">
		        </div>

				<!-- Number -->
		        <div class="form-group col-md-2">
		          <input id="ID0_sum" name="ID0_sum" type="number" class="input_sum form-control" readonly="readonly">
		        </div>
	        </div><!-- end #entry1 -->
		</div>
@endsection

@section('script')
	<script src="../resources/assets/js/plugins/select2/select2.full.min.js"></script>
	<script src="../resources/assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="../resources/assets/js/app/trans_input.js"></script>
@endsection