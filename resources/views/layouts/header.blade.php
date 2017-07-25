@extends('layouts.source')
@section('tubuh')
  <body>
  	<nav class="navbar navbar-default">
  		<div class="container-fluid">
  			<div class="navbar-header">
  				<button id="menu_burger" type="button" class="pull-left navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  					<span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				  </button>

  					<a href="#home" class="navbar-brand page-scroll">
  						DEKA Web and IT Solution
  					</a>
  			</div>

  			<div class="collapse " id="bs-example-navbar-collapse-1">
  				<ul class="nav navbar-nav navbar-right">
  					<li><a class="href" href="{{route('agenda.index')}}">&nbsp; Home</a></li>
  					<li><a class="href" href="{{route('user.index')}}">&nbsp; User</a></li>
            <li><a class="href" href="{{url('/logout')}}">&nbsp; Logout</a></li>
  				</ul>
  			</div>
  		</div>
    </nav>

 <!---------------- INI MENU -------------------------------->
    <div id="kiri">
    	<div class="row" id="ungu">
    		<div id="ungu"></div>
    	</div>
      <div class="row">
        <div id="menu">
          <a id="menu-utama"class="list-group-item"><b>DASHBOARD</b></a>
        </div>
      </div>
      <!-- MENU SAMPING -->
      <div class="row">
        <a id="menu_home" class="list-group-item href" href="{{route('agenda.index')}}"><i class="fa fa-home fa-fw fa-lg" aria-hidden="true"></i>&nbsp; Home</a>
        @if (Auth::user()->level == 'admin')
        <a id="menu_user" class="list-group-item href" href="{{route('user.index')}}"><i class="fa fa-user-o fa-fw fa-lg" aria-hidden="true"></i>&nbsp; User</a>
        @endif
        <a class="list-group-item" href="#"><i class="fa fa-cog fa-fw fa-lg" aria-hidden="true"></i>&nbsp; Settings</a>
        <a class="list-group-item" href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw fa-lg" aria-hidden="true"></i>&nbsp; Log Out</a>
      </div>
    </div>
  <!---------------- INI BAGIAN Content -------------------------------->
    @yield('body')
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery.js')}}"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  	<script src="{{asset('js/custom.js')}}"></script>
  	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  	<script src="https://cdn.datatables.net/rowreorder/1.2.0/js/dataTables.rowReorder.min.js"></script>
  	<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
  </body>
@endsection
