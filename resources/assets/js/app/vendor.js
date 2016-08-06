$(document).ready(function () {
	SetDataTable();
});
	
function SetDataTable(){
	$('.dataTables-example').DataTable({
			dom: '<"html5buttons" B>lTfgitp',
			buttons: [
				{
					extend: 'copyHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [ 0, 1 ]
					}
				},
				'colvis'
			]
			//"pageLength" : 25
		});
}