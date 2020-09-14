 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form class="user" method="post" action="<?= base_url('auth/register')?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="name" id="name" name="name" class="form-control" placeholder="Full name" autofocus="autofocus" value="<?= set_value('name'); ?>">
                  <label for="fullname">Full name</label>
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
            </div>
          </div>
            <div class="form-row">
            <div class="col-md-12">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address"  required="required"  value="<?= set_value('email'); ?>">
              <label for="email">Email address</label>
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
        </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputpassword" name="password1" class="form-control" placeholder="Password" required="required">
                  <label for="inputpassword">Password</label>
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmpassword" name="password2" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmpassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?= base_url('auth');?>">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>