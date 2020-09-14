<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url (); ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url (); ?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <?= $this->session->flashdata('message');?>
      <div class="card-body">
        <form class="user" method="post" action="<?= base_url('auth');?>">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="email" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" value="<?= set_value('email'); ?>">
              <label for="email">Email address</label>
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?= base_url('auth/register');?>">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url (); ?>assets/jquery/jquery.min.js"></script>
  <script src="<?= base_url (); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url (); ?>assets/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
