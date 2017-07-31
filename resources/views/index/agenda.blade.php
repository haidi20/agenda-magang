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
                            @if (Auth::user()->level == 'admin')
                              <div class="col-md-2">
                                <label for="usr">User</label>
                                <select style="margin:5px 0px;" id="user" class="form-control show-tick" name="user">
                                  <option value=""> Semua User </option>
                                  @foreach ($users as $users)
                                    <option value="{{$users->name}}" {{$changeUser == $users->name?'selected="select"':''}}>{{$users->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            @endif
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
                             <button style="margin:5px 0px;" id="tombol_filter2" name="all" value="1" type="submit" class="btn btn-success btn-md" style="display:none"><i class="fa fa-database" aria-hidden="true"></i>&nbsp Semua</button>
                             <!-- Trigger the modal with a button -->
                             <button style="margin:5px 0px;" type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp Agenda</button>
                             <!-- Export excel -->
                             <button style="margin:5px 0px;" id="tombol_filter3" name="excel" value="1" type="submit" class="btn btn-secondary" name="excel"><i class="fa fa-print fa-sm " aria-hidden="true"></i>&nbsp Excel</button>
                            </div>
                          </div>
                          </form>
                          <!-- Modal -->

                          <!-- <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Input Agenda</button> -->
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Input Agenda</h4>
                                </div>
                                <form action="{{route('agenda.store')}}" method="post">
                                  {{ csrf_field() }}
                                <div style="padding: 10px 40px 10px 40px;" class="modal-body">
                                  <div class="form-group row">
                                    <div class="form-control-wrapper">
                                      <label for="tgl">Tanggal</label>
                                      <input style="margin:5px 0px;" type="text" id="date1" name="tanggal" class="form-control floating-label" placeholder="Hari/Tanggal">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="example-time-input" class="col-2 col-form-label">Waktu Mulai</label>
                                    <div class="col-10">
                                      <input class="form-control" type="time" value="13:45:00" name="jam_mulai" id="example-time-input">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="example-time-input" class="col-2 col-form-label">Waktu Selesai</label>
                                    <div class="col-10">
                                      <input class="form-control" type="time" value="13:45:00" name="jam_selesai" id="example-time-input">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Kegiatan</label>
                                    <div class="col-10">
                                      <input class="form-control" type="text" value="" name="kegiatan" id="example-text-input">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Proyek</label>
                                    <div class="col-10">
                                      <input class="form-control" type="text" value="" name="proyek" id="example-text-input">
                                    </div>
                                  </div>
                                    <div class="form-group row">
                                      <label for="comment">Keterangan</label>
                                      <input class="form-control" name="keterangan" id="comment"></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <a class="btn btn-danger" data-dismiss="modal">Kembali</a>
                                  <input type="submit" class="btn btn-success" value="kirim"></input>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- Akhir Modal -->
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
