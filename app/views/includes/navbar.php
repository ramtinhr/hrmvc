<nav class="bg-darkBlack p-v-20">
  <div class="main-container display-flex">
    <a class="text-white font-weight-bold font-size-28" href="<?php echo APP_URL; ?>"><?php echo APP_NAME; ?></a>
    <div class="col-xs display-flex justify-content-between align-center">
      <ul class="navbar text-white">
        <li>
          <a href="<?php echo APP_URL; ?>">Home</a>
        </li>
        <li>
          <a href="<?php echo APP_URL; ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar text-white">
				<?php if (isset($_SESSION['user_id'])) : ?>
          <li>
            <a href="#">Welcome <?php echo $_SESSION['user_name']; ?></a>
          </li>
          <li>
            <a href="<?php echo APP_URL; ?>/users/logout">Logout</a>
            <i class="fa fa-sign-out"></i>
          </li>
        <?php else : ?>
          <li>
            <a href="<?php echo APP_URL; ?>/users/Register">Register</a>
          </li>
          <li>
            <a href="<?php echo APP_URL; ?>/users/login">Login</a>
          </li>
				<?php endif ?>
      </ul>
    </div>
  </div>
</nav>
