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
                                  BASIC EXAMPLE
                              </h2><br>
                              <form action="{{url('/agenda/'.$user->id)}}" method="get">
                                {{ csrf_field() }}
                              <div class="row">
                                <div class="col-md-3">
                                 <select id="dropdown1" class="form-control show-tick" name="tahun">
                                  <option value="">--Berdasarkan Tahun--</option>
                                  <option value="2017">2017</option>
                                  <option value="2016">2016</option>
                                  <option value="2015">2015</option>
                                 </select>
                                </div>
                                <div class="col-md-3">
                                 <select id="dropdown2" class="form-control show-tick" name="bulan">
                                  <option value="">--Berdasarkan Bulan--</option>
                                  <option value="01">01</option>
                                  <option value="02">02</option>
                                  <option value="03">03</option>
                                  <option value="04">04</option>
                                 </select>
                                </div>
                                <div class="col-md-3">
                                 <select id="dropdown3" class="form-control show-tick" name="tanggal">
                                  <option value="">--Berdasarkan Tanggal--</option>
                                  @php
                                    for($i = 2 ; $i <= 11; $i++){
                                      echo '<option value="'.$i.'">'.$i.'</option>' ;
                                    }
                                  @endphp
                                 </select>
                                </div>
                                <div class="col-md-3">
                                 <input type="submit" id="kirim" value="kirim">
                                </div>
                              </div>
                              </form>
                          </div>
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
