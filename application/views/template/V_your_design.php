<input type="hidden" id="id_user" value="<?= $this->input->get('id') ?>">
<div class="container-fluid">
    <br>
    <br>
    <br>
    <br>
<h4>Your Design</h4>
<br>
<div class="gallery" id="gallery"></div>
</div>
<div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Design</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
      <div id="data_design">
          <h3>Please Wait..</h3>
      </div>
      </div>
    </div>
  </div>
</div>