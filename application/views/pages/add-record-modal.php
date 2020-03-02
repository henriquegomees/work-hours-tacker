<div class="modal fade" id="registerTimeModal" tabindex="-1" role="dialog" aria-labelledby="registerTimeModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() ?>timeRecord/addRecord" method="post" id="form-register">
          <div class="form-group">
            <label>Time</label>
            <input 
              type="text" 
              class="form-control time" 
              name="time" 
              value="" 
              placeholder="00:00"
              required
              value="<?php echo set_value('time'); ?>"
            >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-save">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.btn-save').click(function(e) {
      e.preventDefault();
      $('#form-register').submit();
    });

    $('.time').mask('00:00');
  });
</script>