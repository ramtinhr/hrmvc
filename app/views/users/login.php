<?php require_once APP_ROOT . '/views/includes/header.php'; ?>
<div class="row min-h-90-vh">
  <div class="col-md-3 margin-auto box-shadow p-20">
    <?php flash('register_success'); ?>
    <h2>Login in to your Account</h2>
    <p>Please fill in your Credential to login</p>
    <form action="<?php echo APP_URL; ?>/users/login" method="POST">
      <div class="form-group">
        <label for="email">Email: <sup>*</sup></label>
        <input type="email" value="<?php echo $data['email']; ?>" name="email" class="form-control <?php echo (!empty($data['errors']['email'])) ? 'is-invalid' : ''; ?>">
        <span class="text-danger font-size-14"><?php echo $data['errors']['email'][0]; ?></span>
      </div>
      <div class="form-group">
        <label for="password">Password: <sup>*</sup></label>
        <input type="password" value="<?php echo $data['password']; ?>" name="password" class="form-control <?php echo (!empty($data['errors']['password'])) ? 'is-invalid' : ''; ?>">
        <span class="text-danger font-size-14"><?php echo $data['errors']['password'][0]; ?></span>
        <span class="text-danger font-size-14"><?php echo $data['password_err']; ?></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <input type="submit" value="Login" class="btn btn-black">
        </div>
        <div class="col-xs-6 display-flex justify-content-center align-center">
          <a href="<?php echo APP_URL; ?>/users/register">No account? Register</a>
        </div>
      </div>
    </form>
  </div>
</div>
<?php require_once APP_ROOT . '/views/includes/footer.php' ?>
