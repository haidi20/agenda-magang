<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css')}}">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

	<link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />


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
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
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
                {{-- <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
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
                    </div>
                </div> --}}
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
          @if (Auth::user()->status == 1)
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
                    <h2>Agenda</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hari/Tanggal</th>
                                    <th>Jam</th>
                                    <th>Kegiatan</th>
                                    <th>Nama Project</th>
              <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Senin, 3 Juli 2017</td>
                                    <td>09.00 s/d 16.00</td>
                                    <td>Mengurus E-Ktp</td>
                                    <td> - </td>
              <td>Belum Selesai</td>
                                </tr>
            <tr>
                                    <td>1</td>
                                    <td>Senin, 3 Juli 2017</td>
                                    <td>09.00 s/d 16.00</td>
                                    <td>Mengurus E-Ktp</td>
                                    <td> - </td>
              <td>Belum Selesai</td>
                                </tr>
            <tr>
                                    <td>1</td>
                                    <td>Senin, 3 Juli 2017</td>
                                    <td>09.00 s/d 16.00</td>
                                    <td>Mengurus E-Ktp</td>
                                    <td> - </td>
              <td>Belum Selesai</td>
                                </tr>
            <tr>
                                    <td>1</td>
                                    <td>Senin, 3 Juli 2017</td>
                                    <td>09.00 s/d 16.00</td>
                                    <td>Mengurus E-Ktp</td>
                                    <td> - </td>
              <td>Belum Selesai</td>
                                </tr>
            <tr>
                                    <td>1</td>
                                    <td>Senin, 3 Juli 2017</td>
                                    <td>09.00 s/d 16.00</td>
                                    <td>Mengurus E-Ktp</td>
                                    <td> - </td>
              <td>Belum Selesai</td>
                                </tr>
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
                                    <input type="hidden" name="id" value="{{$user->id}}">
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
                                       <input type="text" class="timepicker form-control" name="jam_start" placeholder="Jam Mulai">
                                   </div>
                               </div>
                           </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                   <div class="form-line">
                                       <input type="text" class="timepicker form-control"  name="jam_end" placeholder="Jam Selesai">
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

  @yield('tambah-user')

<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------PAGE USER --------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------->
<!----JIKA BUKAN ADMIN MAKA TIDAK USAH DI TAMPILKAN-->

    @yield('user')

    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

	<!-- Jquery custom Js -->
    <script src="{{asset('js/custom.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('js/demo.js')}}"></script>

	<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('js/demo.js')}}"></script>

	<!-- Moment Js -->
	<script src="{{asset('plugins/momentjs/moment.js')}}"></script>

	<!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

	<script src="{{asset('js/pages/forms/basic-form-elements.js')}}"></script>

	<!-- Autosize Plugin Js -->
    <script src="{{asset('plugins/autosize/autosize.js')}}"></script>

	<script src="{{asset('plugins/node-waves/waves.js')}}"></script>
</body>

</html>
