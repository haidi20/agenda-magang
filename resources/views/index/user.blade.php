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
													  <table width="100%">
														<tr>
															<td align="left"><h4>TABLE USER</h4></td>
															<td align="right"><button align="center" data-toggle="modal" data-target="#myModaluser"class="btn btn-primary">Tambah User </button></td>
														</tr>
													  </table>
												  </div>
												  <br>
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
											  <input type="submit" name="edit" class="btn btn-success edit_user" data-id="{{$user_s->id}}" data-name="{{$user_s->name}}" data-jabatan="{{$user_s->jabatan}}" data-email="{{$user_s->email}}" value="edit" data-toggle="modal" data-target="#myModal">
											  <input type="submit" name="delete" class="btn btn-danger hapus_user" data-id="{{$user_s->id}}" data-name="{{$user_s->name}}" value="delete" data-toggle="modal" data-target="#myModaldelete">
										  @endif
										  </td>
									  </tr>
                    <!--------------------------------------------------------------------------------------------------->
                    <!------------------------ Modal Untuk Delete User--------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------->
                    <div class="modal fade" id="myModaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Yakin Ingin Menghapus <span id="nama_delete_modal"></span> ? </h4>
                          </div>
                    		<center>
                    			<img src="{{asset('img/danger.png')}}">
                    		</center>
                    	 <form action="{{route('user.destroy' , $user_s->id)}}"  method="post">
                         {{ csrf_field() }}
                    	 <div class="modal-footer">
                    		<input name="id" type="hidden" class="form-control" id="id_delete_modal" >
                        <input type="hidden" name="_method" value="delete">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                    	 </form>
                         </div>
                    	</div>
                      </div>
                    </div>
                    <!--------------------------------------------------------------------------------------------------->
                    <!------------------------- Modal Untuk Edit User --------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                          </div>
                    	 <form action="{{route('user.update' , $user_s->id)}}" method="post">
                         {{ csrf_field() }}
                         <input type='hidden' name='_method' value='put'>
                          <div class="modal-body">
                            <div class="form-group row">
                    			<label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                    			<div class="col-sm-10">
                    			  <input name="id" type="hidden" class="form-control" id="id_edit_modal" >
                    			  <input name="nama" type="text" class="form-control" id="nama_edit_modal" >
                    			</div>
                    		</div>
                    		<div class="form-group row">
                    			<label for="inputPassword3" class="col-sm-2 col-form-label">Jabatan</label>
                    			<div class="col-sm-10">
                    			  <input name="jabatan" type="text" class="form-control" id="jabatan_edit_modal" >
                    			</div>
                    		</div>
                    		<div class="form-group row">
                    			<label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                    			<div class="col-sm-10">
                    			  <input name="email" type="text" class="form-control" id="email_edit_modal" >
                    			</div>
                    		</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                    	 </form>
                        </div>
                      </div>
                    </div>
									@endforeach
								  </tbody>
							  </table>
												  </div>
											  </div>
										  </div>
									  </div>
									  <!-- #END# Basic Examples -->


  						</div>

<!--------------------------------------------------------------------------------------------------->
<!------------------------ Modal Untuk Tambah User--------------------------------------------------->
<!--------------------------------------------------------------------------------------------------->

<div class="modal fade" id="myModaluser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
	 <form action="{{route('user.store')}}" method="post">
     {{ csrf_field() }}
      <div class="modal-body">
        <div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
			  <input name="nama" type="text" class="form-control" placeholder="Nama">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Jabatan</label>
			<div class="col-sm-10">
			  <input name="jabatan" type="text" class="form-control" placeholder="Jabatan">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
			  <input name="email" type="text" class="form-control" placeholder="Email">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
			  <input name="password" type="password" class="form-control" placeholder="Password" id="password">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Ulangi Password</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" placeholder="Ulangi Password" id="repassword">
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
	 </form>
    </div>
  </div>
</div>
  <!-----------------Batas Halaman User-------------------------------------------->
  					</div>
  				</div>
  			</div>
  		</div>
	   </section>
  </div>
@endsection
