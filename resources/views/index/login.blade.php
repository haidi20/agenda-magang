@extends('layouts.layout')
@section('body')
  <body class="login-page">
      <div class="login-box">
          <div class="logo">
              <a href="javascript:void(0);">Aplikasi Agenda</a>
              <small>Admin BootStrap Based - Material Design</small>
          </div>
          <div class="card">
              <div class="body">
                  <form id="sign_in" method="POST" action="{{!Request::secure()?secure_url('/login'):url('/login')}}">
                  {{-- {{dd(!Request::secure())}} --}}
                      <div class="msg">{{Session::get('note')}}</div>
                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="material-icons">person</i>
                          </span>
                          <div class="form-line">
                              <input type="text" class="form-control" name="name" placeholder="Username" required autofocus>
                          </div>
                      </div>
                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="material-icons">lock</i>
                          </span>
                          <div class="form-line">
                              <input type="password" class="form-control" name="pass" placeholder="Password" required>
                          </div>
                      </div>
                      {{ csrf_field() }}
                      <div class="row">
                          <div class="col-xs-8 p-t-5">

                          </div>
                          <div class="col-xs-4">
                              <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                          </div>
                      </div>
                      <div class="row m-t-15 m-b--20">

                      </div>
                  </form>
              </div>
          </div>
      </div>

      @include('layouts.source-js')
  </body>
@endsection
