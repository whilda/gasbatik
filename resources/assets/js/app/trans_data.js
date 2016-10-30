$(document).ready(function () {
	var table = $('#dataTables').DataTable( {
        "ajax": "./api/transaction",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "id" },
            { "data": "customer" },
            { "data": "trans_date" },
            { "data": "profit" },
            { "data": "total" },
            {
                "className":      'item-reject',
                "defaultContent": ''
            },
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#dataTables tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
            SetDataTable(row.data().id);
        }
    } );
    // Add event listener for reject
    $('#dataTables tbody').on('click', 'td.item-reject', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        window.location.href = "./trans_reject/" + row.data().id;
    } );
});

/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row

    // Tabel tag
    var child_html = '<table class="table-striped table-bordered table-hover dataTables-child" id='+d.id+'>'+
    	'<thead>'+
			'<tr>'+
				'<th rowspan="2"></th>'+
				'<th rowspan="2">Item</th>'+
				'<th rowspan="2">Quantity</th>'+
				'<th colspan="2">Profit</th>'+
				'<th colspan="2">Price</th>'+
			'</tr>'+
			'<tr>'+
				'<th>Unit</th>'+
				'<th>Total</th>'+
				'<th>Unit</th>'+
				'<th>Total</th>'+
			'</tr>'+
		'</thead>'+
		'</tbody>';
	for (var i = 0; i < d.items.length; i++) {
		child_html += 
		'<tr>'+
            '<td>'+(i+1)+'</td>'+
            '<td>'+d.items[i].code+'</td>'+
            '<td>'+d.items[i].pivot.qty+'</td>'+
            '<td>'+d.items[i].pivot.unit_profit+'</td>'+
            '<td>'+d.items[i].pivot.sum_profit+'</td>'+
            '<td>'+d.items[i].pivot.unit_price+'</td>'+
            '<td>'+d.items[i].pivot.sum_price+'</td>'+
        '</tr>';
	}
  	child_html += '</tbody></table>'; // Table Tag close
    return child_html;
}

function SetDataTable(id){
	$('#'+id).DataTable({
		"paging":   false,
        "ordering": false,
        "info":     false,
        "searching":	false, 
	});
}