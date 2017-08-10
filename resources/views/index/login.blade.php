@extends('layouts.source')
@section('tubuh')
  <body style="background-color: #565C63;">
    <div class="logo">
        <a href="javascript:void(0);">Aplikasi <b>Agenda</b></a>
    </div>
    <div class="kartu">
      <form id="kartu" action="{{url('/login')}}" method="post">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o fa-fw fa-lg" aria-hidden="true"></i></span>
          <input type="text" name="name"class="form-control" placeholder="Username"><br>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock fa-fw fa-lg" aria-hidden="true"></i></span>
          <input type="password" name="pass" class="form-control" placeholder="Password"><br>
        </div>
        <div class="btn">
        {{ csrf_field() }}
        <input class="btn btn-success" type="submit" name="kirim" value="MASUK">
      </div>
      </form>
    </div>

    <div class="logo">
            <small>© Copyright 2017 | Created by DEKA magang Team</small>
    </div>
  </body>
@endsection
