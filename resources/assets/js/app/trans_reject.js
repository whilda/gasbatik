$(document).ready(function () {
	$('#btnAdd').click(function () {
        var num     = $('.clonedInput').length, // Checks to see how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // The numeric ID of the new input field being added, increasing by 1 each time
            newElem = $("#template").clone().attr('id', 'entry' + newNum).attr('class', 'clonedInput').fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
    
    /*  This is where we manipulate the name/id values of the input inside the new, cloned element
        Below are examples of what forms elements you can clone, but not the only ones.
        There are 2 basic structures below: one for an H2, and one for form elements.
        To make more, you can copy the one for form elements and simply update the classes for its label and input.
        Keep in mind that the .val() method is what clears the element when it gets cloned. Radio and checkboxes need .val([]) instead of .val('').
    */
        // H2 - section
        newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html(newNum);

        // Unit - number
        newElem.find('.input_qty').attr('id', 'ID' + newNum + '_qty').attr('name', 'ID' + newNum + '_qty').val('');

        // Item - select
        newElem.find('.select_item').attr('id', 'ID' + newNum + '_item').attr('name', 'ID' + newNum + '_item').attr('onchange', 'set_price(' + newNum + ')').val('');
        
        // Note - text
        newElem.find('.input_note').attr('id', 'ID' + newNum + '_note').attr('name', 'ID' + newNum + '_note').val('');

        // Unit Price - Number
        newElem.find('.input_unit_price').attr('id', 'ID' + newNum + '_unit_price').attr('name', 'ID' + newNum + '_unit_price').val('');

        // Sum - Number
        newElem.find('.input_sum').attr('id', 'ID' + newNum + '_sum').attr('name', 'ID' + newNum + '_sum').val('');

    // Insert the new element after the last "duplicatable" input field
        $('#entry' + num).after(newElem);
        $('#ID' + newNum + '_title').focus();

    // Enable the "remove" button. This only shows once you have a duplicated section.
        $('#btnDel').attr('disabled', false);

    // Right now you can only add 4 sections, for a total of 5. Change '5' below to the max number of sections you want to allow.
        if (newNum == 15)
        $('#btnAdd').attr('disabled', true).prop('value', "You've reached the limit"); // value here updates the text in the 'add' button when the limit is reached 
    // Select2 Init
	    $('#ID' + newNum + '_item').select2();
		$('#ID' + newNum + '_item'+'-placeholer').select2({
			allowClear: true
		});
    });

    $('#btnDel').click(function () {
    // Confirmation dialog box. Works on all desktop browsers and iPhone.
        if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
            {
                var num = $('.clonedInput').length;
                // how many "duplicatable" input fields we currently have
                $('#entry' + num).slideUp('slow', function () {$(this).remove();
                $('#num').val($('.clonedInput').length);
                calc_total();
                // if only one element remains, disable the "remove" button
                    if (num -1 === 1)
                $('#btnDel').attr('disabled', true);
                // enable the "add" button
                $('#btnAdd').attr('disabled', false).prop('value', "add section");});
            }
        return false; // Removes the last section you added
    });
    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
    // Disable the "remove" button
    $('#btnDel').attr('disabled', true);
    // Select2 Init
    $("#ID1_item").select2();
	$("#ID1_item-placeholer").select2({
		allowClear: true
	});
	// Date Picker
	$('#date-popup').datepicker({
		keyboardNavigation: false,
		forceParse: false,
		todayHighlight: true
	});
});

function calc_total(){
	var num     = $('.clonedInput').length;
	var total = 0;
	for (var i = 1; i <= num; i++) {
		var qty = $('#ID'+i+'_qty').val();
		var unit = $('#ID'+i+'_unit_price').val();
		var sum = qty*unit;
		total += sum;
		$('#ID'+i+'_sum').val(sum);
	}
	var formatted = parseFloat((""+total).replace(/,/g, ""))
				        //.toFixed(2)
				        .toString()
				        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	$('#trans_total').text(formatted);
	$('#total').val(total);
	$('#num').val(num);
}
function set_price(i){
	$id = $("#ID"+i+"_item").val();
	$.getJSON( "./api/item/"+$id, function( data ) {
		$("#ID"+i+"_unit_price").val(data.sell_price);
		calc_total()
	});
}