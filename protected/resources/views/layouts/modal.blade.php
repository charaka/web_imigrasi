<style type="text/css">
  .modal-header-primary{
    background-color:#337ab7; color:white;
  }

  .modal-body .overlay{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.7);
  }

  .modal-body .overlay i{
    position: absolute;
    top: 50%;
    left: 50%;
  }
</style>
<!-- multi purposes modal -->
<div class="modal fade" id="modal-large" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><!-- Modal title -->Input Nilai Matakuliah - Update Software</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body-content" style="min-height:100px;">
          
        </div>
        <div class="overlay" id="" style="display:none; z-index:3;">
            <i class="fa fa-refresh fa-spin loading-icon"></i>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-undo"></i> Reset</button>
      </div> -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->