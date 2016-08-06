@extends('layouts.dashboard')

@section('title')
	Gas Batik - Item
@endsection

@section('item')
	active
@endsection

@section('item_data')
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
	<link href="../resources/assets/css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
	<link href="../resources/assets/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
@endsection

@section('content')
		<h1 class="page-title">Item Data View</h1>
		<!-- Breadcrumb -->
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a href="./home"><i class="fa fa-home"></i>Home</a></li> 
			<li><a href="./item_data">Item</a></li> 
			<li class="active">Data View</li> 
		</ol>
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
								<table class="table table-striped table-bordered table-hover dataTables-example" id="dataTables">
									<thead>
										<tr>
											<th>Code</th>
											<th>Vendor</th>
											<th>Type</th>
											<th>Material</th>
											<th>Note</th>
											<th>Purchase</th>
											<th>Sell</th>
											<th>Quantity</th>
										</tr>
									</thead>
									<tbody>
									@if ($items->count())
							            @foreach ($items as $item)
							            <tr>
							            	<td>{{ $item->code }}</td>
							            	<td>{{ $item->vendor->name }}</td>
							            	<td>{{ $item->type->name }}</td>
							            	<td>{{ $item->material->name }}</td>
							            	<td>{{ $item->note }}</td>
							            	<td>{{ $item->purchase_price }}</td>
							            	<td>{{ $item->sell_price }}</td>
							            	<td>{{ $item->quantity }}</td>
							            </tr>
							            @endforeach
									@endif
									</tbody>
									<tfoot>
										<tr>
											<th>Code</th>
											<th>Vendor</th>
											<th>Type</th>
											<th>Material</th>
											<th>Note</th>
											<th>Purchase</th>
											<th>Sell</th>
											<th>Quantity</th>
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
	<script src="../resources/assets/js/app/item_data.js"></script>
@endsection