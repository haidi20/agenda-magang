<div class="modal fade" id="myModalAddProyek" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Proyek</h4>
      </div>
      <form action="{{route('proyek.store')}}" method="post">
        {{ csrf_field() }}
        <div style="padding: 10px 40px 10px 40px;" class="modal-body">
          <div class="form-group row">
            <div class="form-control-wrapper">
              <label for="tgl">Proyek</label>
              <input id="nama_proyek_modal" style="margin:5px 0px;" type="text" name="proyek" class="form-control floating-label" placeholder="Nama Proyek">
			  <div class="alert-danger" id="error_modal_proyek">Tidak Boleh Kosong</div>
			</div>
          </div>

        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" data-dismiss="modal">Kembali</a>
          <input type="submit" class="btn btn-success kirim_proyek" value="kirim"></input>
        </div>
      </form>
    </div>
  </div>
</div>
