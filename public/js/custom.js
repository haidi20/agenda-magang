function ajax(){
	$.ajaxSetup({
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});
}

$(document).on('click','#kirim', function(){
		ajax() ;

		var id = $(this).attr('data-user');
    var name1 =$('#dropdown1').find(":selected").val();
    var name2 =$('#dropdown2').find(":selected").val();
    var name3 =$('#dropdown3').find(":selected").val();
		$.ajax({
				url			: '/home/'+id ,
				method	: 'get',
				data		: {data1 : name1, data2:name2, data3:name3},
				success	: function(data){
					console.log(data);
				}
		});
  });

// hapus data user
$(document).on('click' , '.hapus_user', function(){
 ajax() ;
 var id = $(this).attr('data-id');
 $.ajax({
  url   : '/delete/user',
  method : 'post',
  data  : {id:id},
  success : function(data){
   // console.log(data);
   $('#user_'+data).fadeOut();
  }
 });
});


// update data user
$(document).on('click','#update-user', function(){
	ajax() ;
	var id 			= $('#id').val();
	var name 		= $('#name').val();
	var jabatan = $('#jabatan').val();
	var email 	= $('#email').val();
	// console.log(jabatan + 'jabatan');

	$.ajax({
			url			: '/update/user',
			method	: 'post',
			data		:	{id:id,name : name, jabatan:jabatan,email:email},
			success	: function(data){
				// console.log(data);
				var text	= '<tr id="user_'+data.id+'">'+
										'<td>'+data.name+'</td>'+
										'<td>'+data.jabatan+'</td>'+
										'<td>'+data.email+'</td>'+
										'<td> <input type="submit" name="edit" class="edit_user"   data-id="'+data.id+'" value="edit" data-toggle="modal" data-target="#defaultModal">' +
										'<input type="submit" name="delete" class="hapus_user" data-id="'+data.id+'" value="delete"></td>'+
										'</tr>';
				$('#user_'+data.id).replaceWith(text);
			}
	});
});

// edit data user
$(document).on('click' , '.edit_user' , function(){
	ajax() ;
	var id = $(this).attr('data-id');
	// console.log(id) ;
	$.ajax({
			url			: '/edit/user',
			method 	: 'post',
			data 		: {id : id},
			success : function(data){
				$('#id').val(data.id);
				$('#name').val(data.name);
				$('#jabatan').val(data.jabatan);
				$('#email').val(data.email);
			}
	});
});



// punya alfian

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
