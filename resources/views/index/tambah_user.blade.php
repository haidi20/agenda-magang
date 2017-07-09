@extends('layouts.index')
@section('tambah-user')
  <div id="tambah_user">
  <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
          <div class="body">
                      <h2 class="card-inside-title">Tambah User</h2>
                          <div class="row clearfix">
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" placeholder="Nama" />
                                      </div>
                                  </div>
                              </div>
               <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" placeholder="Email" />
                                      </div>
                                  </div>
                              </div>
              <div class="col-sm-12">
                <button type="button" class="btn btn-primary waves-effect">Simpan</button>
              </div>
                          </div>
           </div>
        </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
@endsection
