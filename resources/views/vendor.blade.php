@extends('layouts.dashboard')

@section('title')
	Gas Batik - Vendor
@endsection

@section('vendor')
	active
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

@section('css')
	<link href="../resources/assets/css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
	<link href="../resources/assets/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
@endsection

@section('content')
		<h1 class="page-title">Vendor</h1>
		<!-- Breadcrumb -->
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a href="./home"><i class="fa fa-home"></i>Home</a></li> 
			<li class="active">Vendor</li> 
		</ol>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h3 class="panel-title">Form</h3>
						<ul class="panel-tool-options"> 
							<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
							<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							<li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						 <form method="post" action="./vendor">
							  <div class="form-group">
								<label>Vendor</label>
								<input type="text" class="form-control" id="name" name="name">
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
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3 class="panel-title">Vendor Tabel</h3>
							<ul class="panel-tool-options"> 
								<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
								<li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables-example">
									<thead>
										<tr>
											<th>#</th>
											<th>Vendor</th>
										</tr>
									</thead>
									<tbody>
									@if ($vendors->count())
							            @foreach ($vendors as $vendor)
							               <tr><td>{{ $vendor->id }}</td><td>{{ $vendor->name }}</td></tr>
							            @endforeach
									@endif
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Vendor</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection

@section('script')
	<script src="../resources/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../resources/assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="../resources/assets/js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="../resources/assets/js/plugins/datatables/jszip.min.js"></script>
	<script src="../resources/assets/js/plugins/datatables/pdfmake.min.js"></script>
	<script src="../resources/assets/js/plugins/datatables/vfs_fonts.js"></script>
	<script src="../resources/assets/js/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
	<script src="../resources/assets/js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>
	<script src="../resources/assets/js/app/vendor.js"></script>
@endsection