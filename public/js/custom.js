var a=0;
var c=0;


function ajax() {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

// untuk menampilkan data pada edit agenda
$(document).on('click','.edit_agenda',function()
{
	$('.alert-danger#error_modal_tanggal').hide();
	$('.alert-danger#error_modal_jamm').hide();
	$('.alert-danger#error_modal_jams').hide();
	$('.alert-danger#error_modal_kegiatan').hide();
	$('.alert-danger#error_modal_nama_proyek').hide();
	$('.alert-danger#error_modal_keterangan').hide();


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
$(document).on('click','.hapus_agenda',function()
{
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

	$('#error_modal_tanggal').hide();
	$('#error_modal_jamm').hide();
	$('#error_modal_jams').hide();
	$('#error_modal_kegiatan').hide();
	$('#error_modal_nama_proyek').hide();
	$('#error_modal_keterangan').hide();
	$('#error_modal_proyek').hide();
	$('#error_modal_user_nama').hide();
	$('#error_modal_user_email').hide();
	$('#error_modal_user_jabatan').hide();
	$('#error_modal_user_password').hide();
	$('#error_modal_user_repassword').hide();
	$('#error_modal_user_tida_sama').hide();

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
	//alert(lebar);

});


$(window).resize(function()
{
	lebar  = $(window).width();
    f_lebar(lebar);
});

function f_lebar(lebar)
{
	var id = $('.jumlah_data_tabel').attr('id');

	if(lebar < 768 )
	{
		//tampila mobile
		$('#kiri').css({'width' : '0%'});
		$('#kanan').css({'width' : '100%'});

		$('.tabel').hide();


		if(a==0)
		{
			for(var i=1; i<=id; i++)
			{
				id_user= nama = $('#nama_'+i).attr('data-id');
				id_proyek= nama = $('#nama_'+i).attr('data-idProyek');
				nama = $('#nama_'+i).attr('data-name');
				tanggal = $('#nama_'+i).attr('data-tanggal');
				jam = $('#nama_'+i).attr('data-jam');
				jamMulai = $('#nama_'+i).attr('data-jamMulai');
				jamSelesai = $('#nama_'+i).attr('data-jamSelesai');
				kegiatan = $('#nama_'+i).attr('data-kegiatan');
				proyek = $('#nama_'+i).attr('data-proyek');
				ket = $('#nama_'+i).attr('data-ket');
				//ket-lim = $('#nama_'+i).attr('data-ket-lim');
				action = $('#action_'+i).attr('data-status');

				html_tabel_limit = $('#tabel_limit_'+i).html();




				if(action == '')
				{
					$('#nama_'+i).html('<table id="example" class="table table-striped table-bordered dt-responsive nowrap"><tr><td><button style="color:white;background-color:#337ab7;border-radius:5px;border:1px solid transparent;"class="tampil_data" id="'+i+'"><i class="fa fa-plus"></i></button>&nbsp'+nama+'&emsp;'+tanggal+'</td></tr></table><table id="nama_tabel_'+i+'"><tr><td style="padding:10px"><b>Jam</b></td><td style="padding:10px">'+jam+'</td></tr><tr><td style="padding:10px"><b>Kegiatan</b></td><td style="padding:10px">'+kegiatan+'</td></tr><tr><td style="padding:10px"><b>Nama Proyek</b></td><td style="padding:10px">'+proyek+'</td></tr><tr><td style="padding:10px"><b>Keterangan</b></td><td style="padding:10px">'+html_tabel_limit+'</td></tr><tr><td style="padding:10px"><b>Action</b></td><td style="padding:10px">'+action+'</td></tr></table><button style="color:white;background-color:#337ab7;border-radius:5px;border:1px solid transparent;"class="sembunyi_data" id="'+i+'"><i class="fa fa-caret-up"></i></button>');
					//console.log('kosong');
				}
				else
				{
					html_action =  $('#action_'+i).html();
					$('#nama_'+i).html('<table id="example" class="table table-striped table-bordered dt-responsive nowrap"><tr><td><button style="color:white;background-color:#337ab7;border-radius:5px;border:1px solid transparent;" class="tampil_data" id="'+i+'"><i class="fa fa-plus"></i></button>&nbsp'+nama+'&emsp;'+tanggal+'</td></tr></table><table id="nama_tabel_'+i+'"><tr><td style="padding:10px"><b>Jam</b></td><td style="padding:10px">'+jam+'</td></tr><tr><td style="padding:10px"><b>Kegiatan</b></td><td style="padding:10px">'+kegiatan+'</td></tr><tr><td style="padding:10px"><b>Nama Proyek</b></td><td style="padding:10px">'+proyek+'</td></tr><tr><td style="padding:10px"><b>Keterangan</b></td><td style="padding:10px">'+html_tabel_limit+'</td></tr><tr><td style="padding:10px"><b>Action</b></td><td style="padding:10px">'+html_action+'</td></tr></table><button style="color:white;background-color:#337ab7;border-radius:5px;border:1px solid transparent;" class="sembunyi_data" id="'+i+'"><i class="fa fa-caret-up"></i></button>');
				}

				//token = $
				$('#nama_tabel_'+i).hide();
				$('.sembunyi_data').hide();

			}
		}

		a=1;
	}
	else
	{
		$('#kiri').css({'width' : '15%'});
		$('#kanan').css({'width' : '85%'});

		$('.tabel').show();
		for(var i=1; i<=id; i++)
		{
			nama = $('#nama_'+i).attr('data-name');
			$('#nama_tabel_'+i).remove();
			$('#nama_'+i).text(nama);
		}
		a=0;
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

	if(c == 0)
	{
		c=1;
		$('#bs-example-navbar-collapse-1').addClass('in');
	}
	else if(c ==1)
	{
		$('#bs-example-navbar-collapse-1').removeClass('in');
		c=0;
	}


});

$(document).on('click','.kirim_agenda', function(e)
{
	//var tanggal = $('input#date1').val();
	var jam_mulai = $('#jam_mulai').val();
	var jam_selesai = $('#jam_selesai').val();
	var kegiatan = $('#kegiatan').val();
	var nama_proyek = $('#nama_proyek').val();
	var comment = $('#comment').val();


	//if(tanggal == ''){$('#error_modal_tanggal').show();e.preventDefault();}else{$('#error_modal_tanggal').hide();}
	if(jam_mulai == ''){$('#error_modal_jamm').show();e.preventDefault();}else{$('#error_modal_jamm').hide();}
	if(jam_selesai == ''){$('#error_modal_jams').show();e.preventDefault();}else{$('#error_modal_jams').hide();}
	if(kegiatan == ''){$('#error_modal_kegiatan').show();e.preventDefault();}else{$('#error_modal_kegiatan').hide();}
	if(nama_proyek == ''){$('#error_modal_nama_proyek').show();e.preventDefault();}else{$('#error_modal_nama_proyek').hide();}
	if(comment == ''){$('#error_modal_keterangan').show();e.preventDefault();}else{$('#error_modal_keterangan').hide();}

	});

$(document).on('click','.kirim_edit_agenda', function(e)
{
	var tanggal = $('#edit_date1_agenda').val();
	var jam_mulai = $('#edit_jam_mulai').val();
	var jam_selesai = $('#edit_jam_selesai').val();
	var kegiatan = $('#edit_kegiatan').val();
	var nama_proyek = $('#edit_nama_proyek').val();
	var comment = $('#edit_comment').val();


	if(tanggal == ''){$('.alert-danger#error_modal_tanggal').show();e.preventDefault();}else{$('.alert-danger#error_modal_tanggal').hide();}
	if(jam_mulai == ''){$('.alert-danger#error_modal_jamm').show();e.preventDefault();}else{$('.alert-danger#error_modal_jamm').hide();}
	if(jam_selesai == ''){$('.alert-danger#error_modal_jams').show();e.preventDefault();}else{$('.alert-danger#error_modal_jams').hide();}
	if(kegiatan == ''){$('.alert-danger#error_modal_kegiatan').show();e.preventDefault();}else{$('.alert-danger#error_modal_kegiatan').hide();}
	if(nama_proyek == ''){$('.alert-danger#error_modal_nama_proyek').show();e.preventDefault();}else{$('.alert-danger#error_modal_nama_proyek').hide();}
	if(comment == ''){$('.alert-danger#error_modal_keterangan').show();e.preventDefault();}else{$('.alert-danger#error_modal_keterangan').hide();}
});

$(document).on('click','.kirim_proyek', function(e)
{
	var nama = $('#nama_proyek_modal').val();

	if(nama == '')
	{
		$('#error_modal_proyek').show();
		e.preventDefault();
	}
	else
	{
		$('#error_modal_proyek').hide();
	}
});

$(document).on('click','.tampil_data',function()
{
	var id 	= $(this).attr('id');

	$('#nama_tabel_'+id).show();
	$('button#'+id+'.sembunyi_data').show();
	$(this).hide();
});

$(document).on('click','.sembunyi_data',function()
{
	var id 	= $(this).attr('id');

	$('#nama_tabel_'+id).hide();
	$('button.tampil_data#'+id).show();
	$(this).hide();

});

$(document).on('click','.detail',function()
{
	var data 	= $(this).attr('data-ket');

	$('#modal_detail_keterangan').text(data);

});

$(document).on('click','.tambah_user',function(e)
{
	
	var nama 	= $('#tambah_user_nama').val();
	var email 	= $('#tambah_user_email').val();
	var jabatan = $('#tambah_user_jabatan').val();
	var pass 	= $('#tambah_user_password').val();
	var repass 	= $('#tambah_user_repassword').val();
	

	if(nama == ''){$('#error_modal_user_nama').show();e.preventDefault();}else{$('#error_modal_user_nama').hide();}
	if(email == ''){$('#error_modal_user_email').show();e.preventDefault();}else{$('#error_modal_user_email').hide();}
	if(jabatan == ''){$('#error_modal_user_jabatan').show();e.preventDefault();}else{$('#error_modal_user_jabatan').hide();}
	if(pass == ''){$('#error_modal_user_password').show();e.preventDefault();}else{$('#error_modal_user_password').hide();}
	if(repass == '')
	{
		$('#error_modal_user_repassword').show();
		e.preventDefault();
	}
	else
	{
		$('#error_modal_user_repassword').hide();
		if(pass != repass){$('#error_modal_user_tida_sama').show();e.preventDefault();}else{$('#error_modal_user_tida_sama').hide();}
	}
	
	


});

$(document).on('click','.tutup',function()
{
	$('#error_modal_tanggal').hide();
	$('#error_modal_jamm').hide();
	$('#error_modal_jams').hide();
	$('#error_modal_kegiatan').hide();
	$('#error_modal_nama_proyek').hide();
	$('#error_modal_keterangan').hide();
	$('#error_modal_proyek').hide();
	$('#error_modal_user_nama').hide();
	$('#error_modal_user_email').hide();
	$('#error_modal_user_jabatan').hide();
	$('#error_modal_user_password').hide();
	$('#error_modal_user_repassword').hide();
	$('#error_modal_user_tida_sama').hide();
	$('.alert-danger#error_modal_tanggal').hide();
	$('.alert-danger#error_modal_jamm').hide();
	$('.alert-danger#error_modal_jams').hide();
	$('.alert-danger#error_modal_kegiatan').hide();
	$('.alert-danger#error_modal_nama_proyek').hide();
	$('.alert-danger#error_modal_keterangan').hide();

});