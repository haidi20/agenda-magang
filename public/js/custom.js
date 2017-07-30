function ajax() {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

$(document).on('click','#tombol_filter3',function(){
	$('#method').attr('action','excel');
});
$(document).on('click','#tombol_filter2, #tombol_filter1',function(){
	$('#method').attr('action' , 'agenda');
});

$(document).ready(function()
{

	$('#date1,#date2').bootstrapMaterialDatePicker
	({
		time: false,
		clearButton: true
	});
	if ($('#date2').val()) {
		$('#date2').removeAttr('disabled');
	}
	$(document).on('change','#date1',function(){
		$('#date2').removeAttr('disabled');
	});
	var  lebar = $(window).width();
	f_lebar(lebar);

	 var table = $('#example').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );

});


$(window).resize(function()
{
	lebar  = $(window).width();
    f_lebar(lebar);
});

function f_lebar(lebar)
{
	if(lebar < 768 )
	{
		$('#kiri').css({'width' : '0%'});
		$('#kanan').css({'width' : '100%'});
	}
	else
	{
		$('#kiri').css({'width' : '15%'});
		$('#kanan').css({'width' : '85%'});
	}
}

$(document).on('click','.edit_user', function(e)
{
	e.preventDefault();
	var id = $(this).attr('data-id');
	var name = $(this).attr('data-name');
	var jabatan = $(this).attr('data-jabatan');
	var email = $(this).attr('data-email');

	//alert("sayang email = "+email+"\n jabatan = "+jabatan+"\n name = "+name+"\n ini id = "+id);
	$('#id_edit_modal').val(id);
	$('#nama_edit_modal').val(name);
	$('#jabatan_edit_modal').val(jabatan);
	$('#email_edit_modal').val(email);



});

$(document).on('click','.hapus_user', function(e)
{
	e.preventDefault();
	var id = $(this).attr('data-id');
	var name = $(this).attr('data-name');

	//alert("sayang email = "+email+"\n jabatan = "+jabatan+"\n name = "+name+"\n ini id = "+id);
	$('#id_delete_modal').val(id);
	$('#nama_delete_modal').html(name);

});
