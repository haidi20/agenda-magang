function ajax() {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

// untuk menampilkan data pada edit agenda
$(document).on('click','.edit_agenda',function(){
	var id 					= $(this).attr('data-id');
	var tanggal			= $(this).attr('data-tanggal');
	var jam_mulai		= $(this).attr('data-jamMulai');
	var jam_selesai = $(this).attr('data-jamSelesai');
	var kegiatan		= $(this).attr('data-kegiatan');
	var id_proyek		= $(this).attr('data-idProyek');
	var keterangan	= $(this).attr('data-keterangan');
	$('.id_agenda').val(id);
	$('.tanggal_agenda').val(tanggal);
	$('.jam_mulai_agenda').val(jam_mulai);
	$('.jam_selesai_agenda').val(jam_selesai);
	$('.kegiatan_agenda').val(kegiatan);
	$('.keterangan_agenda').val(keterangan);
	$('.proyek_agenda').val(id_proyek);
	$('#form_agenda_edit').attr('action','agenda/'+id);
});
// untuk menampilkan data pada delete agenda
$(document).on('click','.hapus_agenda',function(){
	var id 					= $(this).attr('data-id');
	var kegiatan 		= $(this).attr('data-kegiatan');
	$('#agenda_delete_modal').html('"'+kegiatan+'"');
	$('#form_agenda_delete').attr('action','agenda/'+id);
});

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

$(document).on('click','.simpan', function(e)
{
	//e.preventDefault();
	var password = $('#password').val();
	var pass = $('#pass').val();
	var repass = $('#repass').val();

	if(password == '')
	{
		$('#error_password').html('<div class="alert-danger">*Password Tidak Boleh Kosong</div>');
		e.preventDefault();
	}


	if(pass == '')
	{
		$('#error_pass').html('<div class="alert-danger">*Password Tidak Boleh Kosong</div>');
		e.preventDefault();
	}

	if(repass == '')
	{
		$('#error_repass').html('<div class="alert-danger">*Password Tidak Boleh Kosong</div>');
		e.preventDefault();
	}

	if(pass != repass)
	{
		$('.error_pass').html('<div class="alert-danger">*Password Tidak Sama</div>');
		e.preventDefault();
	}


});

$(document).on('click','#menu_burger', function(e)
{

	if(a == 0)
	{
		a=1;
	}
	else if(a ==1)
	{
		$('#bs-example-navbar-collapse-1').removeClass('.in');
		a=0;
	}


});
