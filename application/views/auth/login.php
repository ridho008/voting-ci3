<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/backend/css/main.css') ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Masuk - Voting CI3</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Voting CI3</h1>
        <div class="alert alert-info"><strong>admin</strong> <br>
        username : ridho000 <br> pass : ridho <br> <strong>petugas</strong> <br> username : petugas1 <br> pass : 123</div>
      </div>
      <div class="login-box">
          <?php 
          $attributes = array('class' => 'login-form');
          ?>
          <?= form_open('/auth/login', $attributes, ''); ?>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <?php if(validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
          </div>
          <?php endif; ?>
          <?php echo $this->session->flashdata('danger'); ?>

          <?php if($this->session->flashdata('success')) : ?>
          <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <button class="close" type="button" data-dismiss="alert">×</button><strong><?= $this->session->flashdata('success') ?></strong>.
              </div>
          </div>
          <?php endif; ?>
          
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" name="username" type="text" autocomplete="off" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
          <?= form_close(); ?>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url('public/backend/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('public/backend/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/backend/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/backend/js/main.js') ?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
         $('.login-box').toggleClass('flipped');
         return false;
      });
    </script>
  </body>
</html>

