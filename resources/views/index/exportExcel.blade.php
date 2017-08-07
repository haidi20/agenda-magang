<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Export</title>
  <style>

	table.table
	{
		border-collapse: collapse;
	}

	  .thead
	  {
		  background-color : #ddd;
		  height : 25;
		  vertical-align: middle;
		  text-align : center;

	  }

	#no
	{
		width : 5;
	}
	#hari
	{
		width : 20;
	}
	#jam
	{
		width : 16;
	}
	#keg
	{
		width : 40;
	}
	#nm
	{
		width : 20;
	}
	#ket
	{
		width : 40;
	}

	table.table tr > td
	{
		border: 12px solid #000000;

	}

	table.table tr > th
	{
		border : 10px solid #000000;

	}

	span
	{
		font-size : 18;
		font-weight : bold;
	}

	#nama
	{
		font-size : 12;
		font-weight : bold;
	}
  </style>
 </head>
 <body>
	<table>
		<tr>
			<td colspan="5" align="center" style="height : 25; vertical-align: middle;"><span>Laporan Agenda Rutinitas DeKA</span></td>
			<td></td>
			<td colspan="1" align="center"></td>

		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
      @if ($nama)
        <td colspan="5" id="nama"> Nama : {{$nama}}</td>
      @endif
			<td></td>
		</tr>
	</table>

	<table border="1" class="table">
		<tr>
			<th id="no" 	class="thead">No</th>
      @if (!$nama)
        <th class="thead">Nama</th>
      @endif
			<th id="hari" class="thead">Hari/Tanggal</th>
			<th id="jam" 	class="thead">Jam</th>
			<th id="keg"	class="thead">Kegiatan</th>
			<th id="nm" 	class="thead">Nama Proyek</th>
			<th id="ket"	class="thead">keterangan</th>
		</tr>


			@foreach($item as $key => $value)
		<?php if($key == 0)
{
	?>
		<tr>
			<td align="center"><?php $b=1; echo $b; ?></td>
      @if (!$nama)
        <td align="center">{{$value->user->name}}</td>
      @endif
			<td align="right">{{$a=$value->jam_mulai->format('Y-m-d') }}</td>
			<td align="center">{{ $value->jam_mulai->format('h:i') }} - {{ $value->jam_selesai->format('h:i') }}</td>
			<td>{{ $value->kegiatan }}</td>
			<td align="center">{{ $value->proyek->nm_proyek }}</td>
			<td>{{ $value->keterangan }}</td>
		</tr>
<?php
}
else
{
		if ($a == $value->jam_mulai->format('Y-m-d'))
		{
?>
			<tr>
			 <td></td>
        @if (!$nama)
          <td align="center">{{$value->name}}</td>
        @endif
				<td></td>
				<td align="center">{{ $value->jam_mulai->format('h:i') }} - {{ $value->jam_selesai->format('h:i') }}</td>
				<td>{{ $value->kegiatan }}</td>
				<td align="center">{{ $value->proyek->nm_proyek }}</td>
				<td>{{ $value->keterangan }}</td>
			</tr>
<?php
		}
		else
		{
			$a = $value->jam_mulai->format('Y-m-d');
			$b=$b+1;
			?>
				<tr>
					 @if (!$nama)
					<td></td>
				  @endif
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td align="center"><?php echo $b; ?></td>
          @if (!$nama)
            <td align="center">{{$value->user->name}}</td>
          @endif
					<td align="right">{{ $value->jam_mulai->format('Y-m-d') }}</td>
					<td align="center">{{ $value->jam_mulai->format('h:i') }} - {{ $value->jam_selesai->format('h:i') }}</td>
					<td>{{ $value->kegiatan }}</td>
					<td align="center">{{ $value->proyek->nm_proyek }}</td>
					<td>{{ $value->keterangan }}</td>
				</tr>
			<?php
		}
}
?>
			@endforeach
	</table>
 </body>
</html>
