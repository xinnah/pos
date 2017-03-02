
	      
//adds extra table rows
/*var i=$('#table_auto tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><input type="text" data-type="barcode" name="barcode[]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" data-type="product_name" name="product_description[]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" data-type="uom" name="uom[]" id="uom_'+i+'" class="form-control " autocomplete="off"></td>';
	html += '<td><input type="text" name="cost_per_unit[]" id="price1_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="text" name="amount[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '</tr>';
	$('#table_auto').append(html);
	i++;
});
*/
//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});

//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
	type = $(this).data('type');
	
	if(type =='barcode' )autoTypeNo=0;
	if(type =='product_name' )autoTypeNo=1; 	
	
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
				   type: type
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split("|");
						return {
							label: code[autoTypeNo],
							value: code[autoTypeNo],
							data : item
						}
					}));
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		appendTo: "#modal-fullscreen",
		select: function( event, ui ) {
			var names = ui.item.data.split("|");
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
	  		console.log(names, id);
	  		
			$('#itemNo_'+id[1]).val(names[0]);
			$('#itemName_'+id[1]).val(names[1]);
			$('#uom_'+id[1]).val(names[4]);
			$('#quantity_'+id[1]).val(names[5]);
			$('#quantity4_'+id[1]).val(1);
			$('#price_'+id[1]).val(names[3]);
			$('#price1_'+id[1]).val(names[2]);
			
			$('#total_'+id[1]).val( 1*names[3] );
			calculateTotal();
		}		      	
	});
});

//price change
$(document).on('change keyup blur','.changesNo',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	quantity = $('#quantity4_'+id[1]).val();
	price = $('#price_'+id[1]).val();
	
	if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );
		
	calculateTotal();
});

$(document).on('change keyup blur','#tax',function(){
	calculateTotal();
});



//total price calculation 
function calculateTotal(){

	//subTotal = $('#total_2'+id[1]).val( 1*names[7]) - $('#total_'+id[1]).val( 1*names[3] );


	subTotal = 0; total =0;

	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );

	});
	$('#subTotal').val( subTotal.toFixed() );
	tax = $('#tax').val();
	if(tax != '' && typeof(tax) != "undefined" ){
		taxAmount = subTotal * ( parseFloat(tax) /100 );
		$('#taxAmount').val(taxAmount.toFixed(2));
		total = subTotal + taxAmount;
	}else{
		$('#taxAmount').val(0);
		total = subTotal;
	}
	$('#totalAftertax').val( total.toFixed(2) );
	calculateAmountDiscount();
}

$(document).on('change keyup blur','#amountPaid1',function(){
	calculateAmountDiscount();
});

//due amount calculation
function calculateAmountDiscount(){
	amountPaid1 = $('#amountPaid1').val();
	//total = $('#totalAftertax').val();
	if(amountPaid1 != '' && typeof(amountPaid1) != "undefined" ){
		
		amountDue = parseFloat(total) + parseFloat( amountPaid1 );
		
		$('.amountDue').val( amountDue.toFixed(2) );
	}else{
		total = parseFloat(total).toFixed(2);
		$('.amountDue').val( total);
	}
//$('#totalAftertax').val( total.toFixed(2) );
	calculateAmountDue();
}

$(document).on('change keyup blur','#amountPaid',function(){
	calculateAmountDue();
});

//due amount calculation
function calculateAmountDue(){
	total = $('#totalAftertax').val() - $('#amountPaid1').val();
	amountPaid = $('#amountPaid').val() ;
	
	//amountPaid1 = $('#amountPaid1').val();
	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
		amountDue = parseFloat(total) - parseFloat( amountPaid );
		$('.amountDue').val( amountDue.toFixed(2) );
	}else{
		total = parseFloat(total).toFixed(2);
		$('.amountDue').val( total);
	}
}




//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

//datepicker
$(function () {
	$.fn.datepicker.defaults.format = "dd-mm-yyyy";
    $('#invoiceDate').datepicker({
        startDate: '-3d',
        autoclose: true,
        clearBtn: true,
        todayHighlight: true
    });
});