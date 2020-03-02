<?php require_once "add-record-modal.php"; ?>
<div class="container pt-5 mt-5">
  <form method="post" id="form-records" action="<?php echo base_url() ?>home/fetchRecords">
    <div class="form-row aling-items-center">
      <div class="form-group col-12">
        <label>Filter by date:</label>
        <input type="text" class="form-control date" name="date" value="<?php echo set_value('date'); ?>"/>
        <span class="text-danger mb-0"><?php echo form_error('date') ?></span>
      </div>

      <div class="form-group col-12 ml-1">
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </div>
  </form>
  <?php if(isset($response)): ?>
    <?php if(count($response['data']) > 0): ?>
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Entry or exit</th>
          </tr>
        </thead>

        <tboby>
          <?php foreach($response['data'] as $item): ?>
            <tr>
              <td>
                <?php echo $item->date; ?>
              </td>
              <td>
                <?php echo $item->time; ?>
              </td>
              <td class="<?php echo $item->entry == '0' ? 'text-danger' : 'text-success' ?>">
                <?php echo $item->entry == '0' ? 'Exit' : 'Entry'; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tboby>
      </table>
    <?php else: ?>
      <p><?php echo $response['message'] ?></p>
    <?php endif; ?>
    <?php else: ?>
      <script>
        function getCurrentDate() {
          const today = new Date();
          return today.toLocaleDateString('pt-BR');
        };

        if($('input[name="date"]').val() === "") {
          $('input[name="date"]').val(getCurrentDate());
          $('#form-records').submit();
        };
      </script>
  <?php endif; ?>
</div>
