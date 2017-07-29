@extends('layouts.header')
@section('body')
  <div id="kanan">
	  <section class="content">
    <div class="container">
    <h2>{{Session::get('note')}}</h2>
    <form action='{{route('setting.store')}}' method="post">
      {{ csrf_field() }}
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password Lama</label>
    <div class="col-md-8">
      <input type="password" name="pass_lama" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password Baru</label>
    <div class="col-md-8">
      <input type="password" name="pass_baru1" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Ulangi Password</label>
    <div class="col-md-8">
      <input type="password" name="pass_baru2" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-md-2 col-md-8">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
    </div>
  </section>
</div>
@endsection
