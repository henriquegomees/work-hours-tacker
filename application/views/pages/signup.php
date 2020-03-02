<div class="registration-page row justify-content-center align-items-center" style="width: 100%; min-height: 100vh;">
  <div class="card" style="width: 30rem">
    <div class="card-body">
      <form method="post" action="<?php echo base_url(); ?>signup/add">
        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="username">Name</label>
              <input 
                name="username" 
                id="username" 
                type="text" 
                class="form-control"
                value="<?php echo set_value('username'); ?>"
                placeholder="John Doe"
              >
              <span class="text-danger"><?php echo form_error('username'); ?></span>
            </div>
          </div>

          <div class="col">
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
          </div>
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

        <div class="form-group">
          <label for="confirmPassword">Confirm your password</label>
          <input 
            name="confirmPassword" 
            id="confirmPassword" 
            type="password" 
            class="form-control" 
            placeholder="******"
            value="<?php echo set_value('confirmPassword'); ?>"
          >
          <span class="text-danger"><?php echo form_error('confirmPassword'); ?></span>
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
      </form>
    </div>
  </div>
</div>