<?php require APP_ROOT . '/views/includes/header.php'; ?>
  <div class="landing">
    <div class="landing__titlebox col-md-4">
      <div>
        <h1 class="font-size-50"><?php echo $data['title'] ?></h1>
      </div>
      <div class="line-height-35">
        <h3 class="font-size-20 m-t-0"><?php echo $data['description'] ?></h3>
      </div>
      <div class="col-md-4 p-l-0">
        <button class="btn btn-outline-dark font-size-18 border-radius-30">
          Documents
        </button>
      </div>
    </div>
    <div class="landing__imagebox">
      <img class="border-radius-70" src="https://s3.envato.com/files/26260992/splash%20-%20CodePower.jpg" alt="img">
    </div>
  </div>
<?php require APP_ROOT . '/views/includes/footer.php'; ?>
