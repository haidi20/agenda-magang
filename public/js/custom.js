//$('#tabel_home').hide();
$('#tambah_agenda').hide();
$('#tambah_user').hide(); //
$('#page_user').hide();
$(document).on('click','a.menu1', function(tambah)
		{
				tambah.preventDefault();

				var id = $(this).attr('href');

				///alert(id);

				if(id == 'home')
				{
					$('#tabel_home').show();
					$('#tambah_agenda').hide();
					$('#tambah_user').hide();
					$('#page_user').hide();

					$('#menu_home').addClass('active');
					$('#menu_tbh_agenda').removeClass('active');
					$('#menu_dftr_user').removeClass('active');
					$('#menu_user').removeClass('active');
				}
				else if(id == 'tbh_agenda')
				{
					$('#tabel_home').hide();
					$('#tambah_agenda').show();
					$('#tambah_user').hide();
					$('#page_user').hide();

					$('#menu_tbh_agenda').addClass('active');
					$('#menu_home').removeClass('active');
					$('#menu_dftr_user').removeClass('active');
					$('#menu_user').removeClass('active');
				}
				else if(id == 'dftr_user')
				{
					$('#tambah_user').show();
					$('#tabel_home').hide();
					$('#tambah_agenda').hide();
					$('#page_user').hide();

					$('#menu_user').removeClass('active');
					$('#menu_dftr_user').addClass('active');
					$('#menu_home').removeClass('active');
					$('#menu_tbh_agenda').removeClass('active');

				}
				else if(id == 'user')
				{
					$('#page_user').show();
					$('#tambah_user').hide();
					$('#tabel_home').hide();
					$('#tambah_agenda').hide();

					$('#menu_user').addClass('active');
					$('#menu_dftr_user').removeClass('active');
					$('#menu_home').removeClass('active');
					$('#menu_tbh_agenda').removeClass('active');

				}
				else
				{
					alert('ada yang salah fah');
				}
		})

		$(document).on('click','#konvert', function(tambah)
				{
						var id = $(this).attr('data');
						var win = window.open(id, '_blank');
  					win.focus();
						//alert('berhasil'+id);
				})
/*
$(document).on('click','button.tampil', function(tambah)
		{
				tambah.preventDefault();

				if(tampil == 1)
				{
					var id = $(this).attr('data-id');
					var nama = $('#nama_simpan_'+id).text();
					$('#1').addClass('modal--active');
					$('#2').addClass('modal__content--active');
					$('button.hapus_admin').attr('data-id',id);
					$('#nama_hapus').append('<div id="nama_hapus_nama">'+nama+'</div>');
					tampil = 2;
				}


		});
*/
