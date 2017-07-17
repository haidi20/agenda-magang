<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <link href="{{asset('favicon.ico')}}" type="image/x-icon"  rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
  <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet" />
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">ADMINBSB - MATERIAL DESIGN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    {{-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> --}}
                    <!-- #END# Call Search -->
                    <!-- Notifications -->

                    <!-- #END# Notifications -->
                    <!-- Tasks -->

                    <!-- #END# Tasks -->
                    {{-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$user->name}}</div>
                    <div class="email">{{$user->email}}</div>
                    {{-- <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li id="menu_home" class="active">
                        <a href="home" class="menu1">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li id="menu_tbh_agenda">
                        <a href="tbh_agenda" class="menu1">
                            <i class="material-icons">text_fields</i>
                            <span>Tambah Agenda</span>
                        </a>
                    </li>
					<!----JIKA BUKAN ADMIN MAKA TIDAK USAH DI TAMPILKAN-->
          @if (Auth::user()->level == 'admin')
            <li id="menu_dftr_user">
                <a href="dftr_user" class="menu1">
                    <i class="material-icons">text_fields</i>
                    <span>Tambah User</span>
                </a>
            </li>
  					<!--------------------------------------------------->
  					<!----JIKA BUKAN ADMIN MAKA TIDAK USAH DI TAMPILKAN-->
  					<li id="menu_user">
                <a href="user" class="menu1">
                    <i class="material-icons">text_fields</i>
                    <span>User</span>
                </a>
            </li>
          @endif

					<!---------------------------------------------------->
        					<li>
                      <a href="{{url('/logout')}}">
                          <i class="material-icons">text_fields</i>
                          <span>Logout</span>
                      </a>
                  </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>

        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
	 <div id="tabel_home">

<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------PAGE Home --------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------->
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Agenda</h2><br>
                    <div class="row">
                      <div class="col-sm-4">
                       <select id="dropdown3" class="form-control show-tick">
                        <option value="">--Berdasarkan Tahun--</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                       </select>
                      </div>
                      <div class="col-sm-4">
                       <select id="dropdown2" class="form-control show-tick">
                        <option value="">--Berdasarkan Bulan--</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                       </select>
                      </div>
                      <div class="col-sm-4">
                       <select id="dropdown1" class="form-control show-tick">
                        <option value="">--Berdasarkan Tanggal--</option>
                        @php
                          for($i = 2 ; $i <= 11; $i++){
                            echo '<option value="'.$i.'">'.$i.'</option>' ;
                          }
                        @endphp
                       </select>
                      </div>
                    </div><br>
                    {{-- <a style="text-decoration : none;" href="{{url('/excel')}}"> --}}
                    <button class="btn btn-danger" id="konvert" data="{{url('/excel/'.$user->id)}}" >Cetak EXCEL</a></button>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
        <!-- #END# Task Info -->

    </div>
</div>
	 </div>

<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------PAGE TAMBAH AGENDA --------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------->
{{-- @yield('tambah-agenda') --}}
<div id="tambah_agenda">
 <div class="row clearfix">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="card">
         <div class="body">
                     <h2 class="card-inside-title">Tambah Kegiatan</h2>
                       <div class="row clearfix">
                         <form action="{{url('/tambah/agenda')}}" method="POST">
                          <div class="col-xs-12">
                            <div class="form-group">
                              {{ csrf_field() }}
                                <div class="form-line">
                                  {{-- @if(Auth::user()->level == 'admin') --}}
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                  {{-- @endif --}}
                                </div>
                            </div>
                               <div class="form-group">
                                   <div class="form-line">
                                       <input type="text" class="datepicker form-control" name="tanggal" placeholder="Tanggal Kegiatan">
                                   </div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <div class="form-line">
                                       <input type="text" class="timepicker form-control" name="jam_mulai" placeholder="Jam Mulai">
                                   </div>
                               </div>
                           </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                   <div class="form-line">
                                       <input type="text" class="timepicker form-control"  name="jam_selesai" placeholder="Jam Selesai">
                                   </div>
                               </div>
                           </div>
                           <div class="col-sm-12">
                               <div class="form-group">
                                   <div class="form-line">
                                       <input type="text" class="form-control"  name="nm_keg" placeholder="Nama Kegiatan" />
                                   </div>
                               </div>
                           </div>
                            <div class="col-sm-12">
                               <div class="form-group">
                                   <div class="form-line">
                                       <input type="text" class="form-control"  name="nm_pro" placeholder="Nama Project" />
                                   </div>
                               </div>
                           </div>
                            <div class="col-sm-12">
                               <div class="form-group">
                                   <div class="form-line">
                                       <input type="text" class="form-control" name="ket" placeholder="Keterangan" />
                                   </div>
                               </div>
                           </div>
                           <div class="col-sm-12">
                             <input type="submit" value="kirim">
                             {{-- <button type="button" class="btn btn-primary waves-effect">Simpan</button> --}}
                           </div>
                           </form>
                       </div>


          </div>
       </div>
             </div>
         </div>
         <!-- #END# Exportable Table -->
     </div>

<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------PAGE TAMBAH USER --------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------->
<!----JIKA BUKAN ADMIN MAKA TIDAK USAH DI TAMPILKAN-->

  {{-- @yield('tambah-user') --}}
  <div id="tambah_user">
  <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
          <div class="body">
                      <h2 class="card-inside-title">Tambah User</h2>
                          <div class="row clearfix">
                            <form action="{{url('/tambah/user')}}" method="POST">
                              {{ csrf_field() }}
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" name="name" placeholder="Nama" />
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" name="email" placeholder="Email" />
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" />
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="password" class="form-control" name="pass" placeholder="Password" />
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                <input type="submit" name="simpan" value="simpan">
                                {{-- <button type="button" class="btn btn-primary waves-effect">Simpan</button> --}}
                              </div>
                              </form>
                          </div>
           </div>
        </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>

<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------PAGE USER --------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------->
<!----JIKA BUKAN ADMIN MAKA TIDAK USAH DI TAMPILKAN-->

    {{-- @yield('user') --}}
    @if(Auth::user()->level == 'admin')
    <div id="page_user">
      <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TABLE USER
                            </h2>
                            <br>
                            <div class="row">
                              <div class="col-sm-4">
                               <select id="dropdown1" class="form-control show-tick">
                                <option value="">--Berdasarkan Tanggal--</option>
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                                <option value="keren">keren</option>
                               </select>
                              </div>

                              <div class="col-sm-4">
                               <select id="dropdown2" class="form-control show-tick">
                                <option value="">--Berdasarkan Bulan--</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                               </select>
                              </div>

                              <div class="col-sm-4">
                               <select id="dropdown3" class="form-control show-tick">
                                <option value="">--Berdasarkan Tahun--</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                               </select>
                              </div>
                             </div>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit User</h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="id">
                  <div class="col-md-12">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="text" class="form-control" id="name" name="name" placeholder="Nama" />
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" />
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                          </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" id="update-user" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    </section>

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  	<script src="{{asset('js/custom.js')}}"></script>
      <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
      <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
      <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
      <script src="{{asset('plugins/node-waves/waves.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
      <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
      <script src="{{asset('js/admin.js')}}"></script>
      <script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
      <script src="{{asset('js/demo.js')}}"></script>
  	<script src="{{asset('js/pages/forms/basic-form-elements.js')}}"></script>
  	<script src="{{asset('plugins/momentjs/moment.js')}}"></script>
  	<script src="{{asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
  	<script src="{{asset('plugins/autosize/autosize.js')}}"></script>
</body>

</html>
