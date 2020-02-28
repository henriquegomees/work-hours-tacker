<div class="row row justify-content-center align-items-center" style="width: 100%; height: 100vh; flex-direction: column">

  <?php if(isset($message)): ?>
    <div class="alert alert-danger" role="alert" style="max-width: 18rem">
      <?php echo $message ?>
    </div>
  <?php endif; ?>

  <div class="card" style="width: 18rem">
    <div class="card-body">
      <form method="post" action="<?php echo base_url()?>login/login">

        <div class="form-group">
          <label for="email">E-mail</label>
          <input 
            name="email" 
            id="email"
            type="email" 
            class="form-control"
            placeholder="example@example.com"
            value="<?php echo set_value('email'); ?>"
          >
          <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input 
            name="password" 
            id="password" 
            type="password" 
            class="form-control" 
            placeholder="******"
            value="<?php echo set_value('password'); ?>"
          >
          <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div>

        <button type="submit" class="btn btn-primary">Log in</button>
      </form>
    </div>
  </div>
</div>