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
                                  TABLE USER
                              </h2>
                          </div>
                          <div class="body">

          <table id="example" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>Name</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user_s)
              <tr id="user_{{$user_s->id}}">
                  <td>{{$user_s->name}}</td>
                  <td>{{$user_s->jabatan}}</td>
                  <td>{{$user_s->email}}</td>
                  <td>
                  @if ($user_s->level != 'admin')
                      <input type="submit" name="edit" class="edit_user" data-id="{{$user_s->id}}" value="edit" data-toggle="modal" data-target="#defaultModal">
                      <input type="submit" name="delete" class="hapus_user" data-id="{{$user_s->id}}" value="delete">
                  @endif
                  {{-- <input type="hidden" name="" value=""> --}}
                  </td>
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
