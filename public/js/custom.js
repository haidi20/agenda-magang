$(document).ready(function()
{
	//$('#home').hide();
	//$('#user').hide();
	$('#tambah_range').click(function(){
		$('#range').hide();
		$('#tanggal2').show();
	});
	var  lebar = $(window).width();
	f_lebar(lebar);

	 var table = $('#example').DataTable( {
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
