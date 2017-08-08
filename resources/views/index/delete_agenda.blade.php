<div class="modal fade" id="myModaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Yakin Ingin Menghapus <span id="agenda_delete_modal"></span> ? </h4>
      </div>
    <center>
      <img src="{{asset('img/danger.png')}}">
    </center>
    <form id="form_agenda_delete" method="post">
     {{ csrf_field() }}
      <div class="modal-footer">
        <input name="id" type="hidden" class="form-control" id="id_delete_modal" >
        <input type="hidden" name="_method" value="delete">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </form>
  </div>
  </div>
</div>
