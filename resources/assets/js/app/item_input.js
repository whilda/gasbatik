$(document).ready(function () {
	$("#vendor_id").change(function(){
	    makeCode();
	});
    $("#type_id").change(function(){
	    makeCode();
	});
    $("#material_id").change(function(){
	    makeCode();
	});
    $("#note").keyup(function(){
	    makeCode();
	});
	
	$(".select2").select2();
	$(".select2-placeholer").select2({
		allowClear: true
	});
});

function makeCode(){
	$vendor_id = $("#vendor_id").val();
	$type_id = $("#type_id").val();
	$material_id = $("#material_id").val();
	$note = $("#note").val();
	$("#code").val($vendor_id+"-"+$type_id+"-"+$material_id+"-"+$note);
}