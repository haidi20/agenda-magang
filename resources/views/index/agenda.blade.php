@extends('layouts.index')
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
                      <div class="card">
                          <div class="header">
                              <h2>
                                  Agenda
                              </h2>
                              <form action="{{route('agenda.index')}}" method="get">
                              <div class="row">
                                <div class="col-md-3">
                                 <select class="form-control show-tick" name="date1">
                                  <option value="">-- Semua Tanggal --</option>
                                  <option value="2016-01-10">2016-01-10</option>
                                  <option value="2016-05-11">2016-05-11</option>
                                  <option value="2017-01-07">2017-01- 07</option>
                                 </select>
                                </div>
                                <div class="col-md-3">
                                 <select class="form-control show-tick" name="date2">
                                  <option value="">-- Semua Tanggal --</option>
                                  <option value="2016-01-10">2016-01-10</option>
                                  <option value="2016-05-11">2016-05-11</option>
                                  <option value="2017-01-07">2017-01-07</option>
                                 </select>
                                </div>
                                @if (Auth::user()->level == 'admin')
                                  <div class="col-md-2">
                                    <select class="form-control show-tick" name="user">
                                      <option value="">-- Semua User --</option>
                                      @foreach ($users as $users)
                                        <option value="{{$users->name}}">{{$users->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-3">
                                    <select class="form-control show-tick" name="proyek">
                                      <option value="">-- Semua Proyek --</option>
                                    </select>
                                  </div>
                                @endif
                                <div class="col-md-1">
                                 <input type="submit" id="kirim" value="filter">
                                </div>
                              </div>
                              </form>
                          </div><br>
                          <div class="body">

          <table id="example" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              @if (Auth::user()->level == 'admin')
                <th>User</th>
              @endif
                <th>Hari/Tanggal</th>
                <th>Jam</th>
                <th>Kegiatan</th>
                <th>Nama Project</th>
                <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($agenda as $agenda)
              <tr>
                  {{-- <td>{{$agenda->id}}</td> --}}
                  @if (Auth::user()->level == 'admin')
                  <td>{{$agenda->user->name}}</td>
                  @endif
                  <td>{{$agenda->tanggal}}</td>
                  <td>{{$agenda->jam_mulai}} s/d {{$agenda->jam_selesai}}</td>
                  <td>{{$agenda->kegiatan}}</td>
                  <td>{{$agenda->nm_proyek}} </td>
                  <td>{{$agenda->keterangan}}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
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
