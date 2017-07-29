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
                      <div class="card">
                          <div class="header">
                              <h2>
                                  TABLE AGENDA
                              </h2>
                              <form id="method" method="get">
                              <div class="row">
                                <div class="col-md-offset-1 col-md-3">
                                  <div class="form-control-wrapper">
                        						<input type="text" id="date1" value="{{$changeDate1}}" name="date1" class="form-control floating-label" placeholder="Date" >
                        					</div>
                                </div>
                                <div class="col-md-3" style="display:none;" id="date2">
                                  <div class="form-control-wrapper">
                                    <input type="text" id="date2" name="date2" class="form-control floating-label" placeholder="Date">
                                  </div>
                                </div>
                                @if (Auth::user()->level == 'admin')
                                  <div class="col-md-2">
                                    <select class="form-control show-tick" id="user" name="user">
                                      <option value="0">-- Semua User --</option>
                                      @foreach ($users as $users)
                                        <option value="{{$users->name}}" {{$changeUser == $users->name?'selected="select"':''}}>{{$users->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                    <select class="form-control show-tick" id="proyek" name="proyek">
                                      <option value="0">-- Semua Proyek --</option>
                                      @foreach ($proyekk as $proyek)
                                        <option value="{{$proyek->nm_proyek}}" {{$changeProyek == $proyek->nm_proyek?'selected="select"':''}}>{{$proyek->nm_proyek}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                @endif
                                <div class="col-md-2">
                                 <input type="submit" name="filter" id="tombol_filter1" value="filter" style="display:none">
                                 <input type="submit" name="all" id="tombol_filter2" value="All">
                                 <input type="submit" name="excel" id="tombol_filter3" value="Export Excel">
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
                <th>Nama Proyek</th>
                <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($agendaa as $agenda)
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
  					</div>
  				</div>
  			</div>
  		</div>
	   </section>
  </div>
@endsection
