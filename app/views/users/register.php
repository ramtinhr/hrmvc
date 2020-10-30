<?php require_once APP_ROOT . '/views/includes/header.php'; ?>
  <div class="row min-h-90-vh">
    <div class="col-md-3 margin-auto box-shadow p-20">
      <h2>Create An Account</h2>
      <p>Please fill out this form to register with us</p>
      <form action="<?php echo APP_URL; ?>/users/register" method="POST">
        <div class="form-group">
          <label for="name">Name: <sup>*</sup></label>
          <input type="text" value="<?php echo $data['name']; ?>" name="name" class="form-control <?php echo (!empty($data['errors']['name'])) ? 'is-invalid' : ''; ?>">
          <span class="text-danger font-size-14"><?php echo  $data['errors']['name'][0]; ?></span>
        </div>
        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email"  value="<?php echo $data['email']; ?>" name="email" class="form-control <?php echo (!empty($data['errors']['email'])) ? 'is-invalid' : ''; ?>">
          <span class="text-danger font-size-14"><?php echo $data['errors']['email'][0]; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password"  value="<?php echo $data['password']; ?>" name="password" class="form-control <?php echo (!empty($data['errors']['password'])) ? 'is-invalid' : ''; ?>">
          <span class="text-danger font-size-14"><?php echo $data['errors']['password'][0]; ?></span>
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm password: <sup>*</sup></label>
          <input type="password" value="<?php echo $data['confirm_password']; ?>" name="confirm_password" class="form-control <?php echo (!empty($data['errors']['confirm_password'])) ? 'is-invalid' : ''; ?>">
          <span class="text-danger font-size-14"><?php echo  $data['errors']['confirm_password'][0]; ?></span>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <input type="submit" value="Register" class="btn btn-black">
          </div>
          <div class="col-xs-6 display-flex justify-content-center align-center">
            <a href="<?php echo APP_URL; ?>/users/login">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php require_once APP_ROOT . '/views/includes/footer.php' ?>
