@extends('layouts.header')
@section('body')
  <div id="kanan">
	  <section class="content">
  		<div class="container">
  			<div class="row clearfix">
  				<div class="row">
  					<div class="col-xs-12" >

  <!--------------------------Halaman HOME---------------------------------------->
  						<div id="home">
  							<!-- Basic Examples -->
              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Bagian filtering -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Panel Filter</div>
                        <div class="panel-body">
                          <!-- Isi Panel -->
                          <form id="method" method="get">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-control-wrapper">
                                <label for="tgl">Rentang Waktu</label>
                                <input style="margin:5px 0px;" type="text" value="{{$changeDate1}}" id="date1" name="date1" class="form-control floating-label" placeholder="Hari/Tanggal">
                              </div>
                            </div>
                            <div class="col-md-3" id="date2_tempat">
                              <div class="form-control-wrapper">
                                <label for="tgl">S/D</label>
                                <input style="margin:5px 0px;" type="text" id="date2" value="{{$changeDate2}}" name="date2" class="form-control floating-label" placeholder="Hari/Tanggal" disabled>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="usr">User</label>
                              <select style="margin:5px 0px;" id="user" class="form-control show-tick" name="user">
                                <option value=""> Semua User </option>
                                @foreach ($users as $users)
                                  <option value="{{$users->name}}" {{$changeUser == $users->name?'selected="select"':''}}>{{$users->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="usr">Proyek</label>
                              <select style="margin:5px 0px;" id="proyek" class="form-control show-tick" name="proyek">
                                <option value=""> Semua Proyek </option>
                                @foreach ($proyekk as $proyek)
                                  <option value="{{$proyek->nm_proyek}}" {{$changeProyek == $proyek->nm_proyek?'selected="select"':''}}>{{$proyek->nm_proyek}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-1">
                             <!-- <input style="margin:5px 0px;" class="btn btn-info" type="submit" value="Filter" id="tombol_filter1" style="display:none"> -->
                             <button style="margin:5px 0px;" id="tombol_filter1" name="filter" value="1" type="submit" class="btn btn-info"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp Filter</button>
                             <!-- <input style="margin:5px 0px;" class="btn btn-success" type="submit" id="tombol_filter2" value="Semua"> -->
                             @if (Auth::user()->level == 'admin')
                               <button style="margin:5px 0px;" data-toggle="modal" data-target="#myModalAddProyek" name="proyek" value="1" type="button" class="btn btn-success btn-md" style="display:none"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp Proyek</button>
                             @endif
                             {{-- <button style="margin:5px 0px;" id="tombol_filter2"   name="all" value="1" type="submit" class="btn btn-warning btn-md" style="display:none"> Reset</button> --}}
                             @if (Auth::user()->level == 'user')
                               <!-- Trigger the modal with a button -->
                               <button style="margin:5px 0px;" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModalAdd"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp Agenda</button>
                             @endif
                             <!-- Export excel -->
                             <button style="margin:5px 0px;" id="tombol_filter3" name="excel" value="1" type="submit" class="btn btn-secondary" name="excel"><i class="fa fa-print fa-sm " aria-hidden="true"></i>&nbsp Excel</button>
                            </div>
                          </div>
                          </form>
                          <!-- <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Input Agenda</button> -->
                        </div>
                    </div>
                    <!-- Akhir Bagian filtering -->
                      <div class="card">
                          <div class="header">
                              <h4>
                                  TABEL AGENDA
                              </h4>

                          </div><br>
                          <div class="body">

          <table class="display nowrap" id='agenda' cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Staf</th>
              <th class="tabel">Hari/Tanggal</th>
              <th class="tabel">Jam</th>
              <th class="tabel">Kegiatan</th>
              <th class="tabel">Nama Proyek</th>
              <th class="tabel">Keterangan</th>
              <th class="tabel">Action</th>
            </tr>
          </thead>
          <tbody>
		  @php $a=1 @endphp
            @foreach ($agendaa as $agenda)
			
              <tr>
                  <td id="nama_{{$a}}" data-idProyek="{{$agenda->proyek_id}}" data-id="{{$agenda->id}}" data-name="{{$agenda->user->name}}" data-tanggal="{{$agenda->jam_mulai->format('Y-m-d')}}" data-jam="{{$agenda->jam_mulai->format('h:i')}} s/d {{$agenda->jam_selesai->format('h:i')}}" data-kegiatan="{{$agenda->kegiatan}}" data-proyek="{{$agenda->proyek->nm_proyek}}" data-ket="{{$agenda->keterangan}}" data-jamMulai="{{$agenda->jam_mulai->format('h:i')}}" data-jamSelesai="{{$agenda->jam_selesai->format('h:i')}}">{{$agenda->user->name}}</td>
                  <td class="tabel">{{$agenda->jam_mulai->format('Y-m-d')}}</td>
                  <td class="tabel">{{$agenda->jam_mulai->format('h:i')}} s/d {{$agenda->jam_selesai->format('h:i')}}</td>
                  <td class="tabel">{{$agenda->kegiatan}}</td>
                  <td class="tabel">{{$agenda->proyek->nm_proyek}}</td>
                  <td class="tabel">{{$agenda->keterangan}}</td>
                  <td class="tabel" id="action_{{$a}}" data-status="@if ($agenda->user->id == Auth::id()) TRUE @endif">
                  @if ($agenda->user->id == Auth::id())
                      <input type="submit" name="edit" class="btn btn-success btn-xs edit_agenda" data-id="{{$agenda->id}}" data-name="{{$agenda->user->name}}" data-tanggal="{{$agenda->jam_mulai->format('Y-m-d')}}" data-jamMulai="{{$agenda->jam_mulai->format('h:i')}}" data-jamSelesai="{{$agenda->jam_selesai->format('h:i')}}" data-kegiatan="{{$agenda->kegiatan}}" data-idProyek="{{$agenda->proyek_id}}" data-keterangan="{{$agenda->keterangan}}" value="edit" data-toggle="modal" data-target="#myModalEdit">
                      <input type="submit" name="delete" class="btn btn-danger btn-xs hapus_agenda" data-id="{{$agenda->id}}" data-kegiatan="{{$agenda->kegiatan}}" value="delete" data-toggle="modal" data-target="#myModaldelete">
                     <div id="ambil_token"> {{ csrf_field() }} </div>
                  @endif
                  </td>
              </tr>
		   @php $a++ @endphp  
            @endforeach
          </tbody>
      </table>
	  
	  <div class="jumlah_data_tabel" id="{{ $a-1 }}">
	 
	  </div>
      {{$agendaa->links()}}
      <!-- Modal add agenda -->
      @include('index.add_agenda')
      <!-- Modal edit agenda -->
      @include('index.edit_agenda')
      <!-- Modal delete agenda -->
      @include('index.delete_agenda')
      @if (Auth::user()->level == 'admin')
        <!-- Modal add agenda -->
        @include('index.add_proyek')
      @endif
                          </div>
                      </div>
                  </div>
              </div>
              <!-- #END# Basic Examples -->


  						</div>
  <!-----------------Batas Halaman Home-------------------------------------------->
  <!--------------------------Halaman User----------------------------------------
  						<div class="card" id="user">
  							Ini Halaman User
  						</div>
  <!-----------------Batas Halaman User-------------------------------------------->
  					</div>
  				</div>
  			</div>
  		</div>
	   </section>
  </div>
@endsection
