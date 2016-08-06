@extends('layouts.dashboard')

@section('title')
	Gas Batik - Transactions
@endsection

@section('trans')
	active
@endsection

@section('trans_data')
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
	<link href="../resources/assets/css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
	<link href="../resources/assets/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
	<style type="text/css">
		td.details-control {
		    background: url('../resources/image/details_open.png') no-repeat center center;
		    cursor: pointer;
		}
		tr.shown td.details-control {
		    background: url('../resources/image/details_close.png') no-repeat center center;
		}
	</style>
@endsection

@section('content')
		<h1 class="page-title">Transaction Data View</h1>
		<!-- Breadcrumb -->
		<ol class="breadcrumb breadcrumb-2"> 
			<li><a href="./home"><i class="fa fa-home"></i>Home</a></li> 
			<li><a href="./trans_data">Transaction</a></li> 
			<li class="active">Data View</li> 
		</ol>
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3 class="panel-title">Transaction Tabel</h3>
							<ul class="panel-tool-options"> 
								<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
								<li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover display" id="dataTables">
									<thead>
										<tr>
											<th></th>
											<th>ID</th>
											<th>Customer</th>
											<th>Date</th>
											<th>Profit</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
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
	<script src="../resources/assets/js/app/trans_data.js"></script>
@endsection