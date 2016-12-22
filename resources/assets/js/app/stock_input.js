$(document).ready(function () {
	$("#item_id").change(function(){
		$id = $("#item_id").val();
		if($id != "-")
			SetData();
		else {
			$("#vendor").val("-");
			$("#type").val("-");
			$("#material").val("-");
			$("#note").val("-");
			$("#purchase_price").val("");
			$("#sell_price").val("");
			$("#old_quantity").val("");
			$("#quantity").val("");
		}
	});
	$(".select2").select2();
	$(".select2-placeholer").select2({
		allowClear: true
	});
});


function SetData(){
	$id = $("#item_id").val();
	$.getJSON( "./api/item/"+$id, function( data ) {
			$("#vendor").val(data.vendor);
		$("#type").val(data.type);
		$("#material").val(data.material);
		$("#note").val(data.note);
		$("#purchase_price").val(data.purchase_price);
		$("#sell_price").val(data.sell_price);
		$("#old_quantity").val(data.quantity);
		$("#quantity").val("");	
	});
}