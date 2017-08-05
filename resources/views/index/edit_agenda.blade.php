<div class="modal fade" id="myModalEdit" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Agenda</h4>
      </div>
      <form id="form_agenda_edit" method="post">
        <input type="hidden" name="id_agenda" class="id_agenda">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}
        <div style="padding: 10px 40px 10px 40px;" class="modal-body">
          <div class="form-group row">
            <div class="form-control-wrapper">
              <label for="tgl">Tanggal</label>
              <input style="margin:5px 0px;" type="text" value='tanggal' name="tanggal" id="example-time-input" class="form-control floating-label tanggal_agenda" placeholder="Hari/Tanggal">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-time-input" class="col-2 col-form-label">Waktu Mulai</label>
            <div class="col-10">
              <input class="form-control jam_mulai_agenda" type="time" name="jam_mulai" id="example-time-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-time-input" class="col-2 col-form-label">Waktu Selesai</label>
            <div class="col-10">
              <input class="form-control jam_selesai_agenda" type="time" value="13:45:00" name="jam_selesai" id="example-time-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Kegiatan</label>
            <div class="col-10">
              <input class="form-control kegiatan_agenda" type="text" value="" name="kegiatan" id="example-text-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="usr">Proyek</label>
            <select style="margin:5px 0px;" class="form-control show-tick proyek_agenda" name="proyek">
              @foreach ($proyekk as $proyek)
                <option value="{{$proyek->id}}" {{$changeProyek == $proyek->nm_proyek?'selected="select"':''}}>{{$proyek->nm_proyek}}</option>
              @endforeach
            </select>
          </div>
            <div class="form-group row">
              <label for="comment">Keterangan</label>
              <input class="form-control keterangan_agenda" name="keterangan" id="comment"></input>
            </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" data-dismiss="modal">Kembali</a>
          <input type="submit" class="btn btn-success kirim_agenda" value="kirim"></input>
        </div>
      </form>
    </div>
  </div>
</div>
