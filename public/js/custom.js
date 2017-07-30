$(document).on('click','#tombol_filter3',function(){
	$('#method').attr('action','excel');
});
$(document).on('click','#tombol_filter2, #tombol_filter1',function(){
	$('#method').attr('action' , 'agenda');
});

$(document).ready(function()
{
	// $('#tombol_filter1').css('display' , 'none') ;
	$('#date1,#date2').bootstrapMaterialDatePicker
	({
		time: false,
		clearButton: true
	});
	$(document).on('change','#date1',function(){
		console.log($(this).val());
		if($(this).val() != 0){
			$('#date2').show();
		}else{

		}
	});
	$(document).on('change','#user,#proyek',function(){
		var user = $('#user').val();
		var proyek = $('#proyek').val();
		if((user != 0) || (proyek != 0)){
			$('#tombol_filter1').show();
			// $('#tombol_filter2').hide();
		}else{
			$('#tombol_filter2').show();
			$('#tombol_filter1').hide();
		}
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

/*
$(document).on('click','a.href', function(e)
{
	e.preventDefault();
	var href = $(this).attr('href');

	if(href == "home")
	{
		//mengganti content
		//$('#home').show();
		//$('#user').hide();

		//mengganti menu yg aktif
		$('#menu_home').addClass('active');
		$('#menu_user').removeClass('active');

	}
	else
	{
		//mengganti content
		//$('#home').hide();
		//$('#user').show();

		//mengganti menu yg aktif
		$('#menu_home').removeClass('active');
		$('#menu_user').addClass('active');
	}

});
*/

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
