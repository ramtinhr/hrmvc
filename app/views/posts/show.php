<?php require_once APP_ROOT . '/views/includes/header.php'; ?>
	<div class="container m-h-auto m-t-30">
		<div class="display-flex justify-content-start">
		<a href="<?php echo APP_URL; ?>/posts" class="btn btn-light">
			<i class="fa fa-arrow-left"></i>
			Back
		</a>
	</div>
		<h1><?php echo $data['post']->title; ?></h1>
    <div class="bg-lightGray text-white p-10 m-b-10">
      Written By <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
    </div>
    <p><?php echo $data['post']->body; ?></p>
    <?php if($data['post']->user_id === $_SESSION['user_id']) : ?>
      <hr class="text-lightgray">
      <div class="row align-center justify-content-between">
        <div class="col-md-1 m-r-20">
          <button class="btn btn-darkBlack display-flex justify-content-center align-center">
            <i class="fa fa-edit m-r-5"></i>
            <a href="<?php echo APP_URL; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="text-white">
              Edit
            </a>
          </button>
        </div>
        <form action="<?php echo APP_URL; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="POST">
          <button type="submit" class="btn btn-danger display-flex align-center">
            <i class="fa fa-trash m-r-5"></i>
            Delete
          </button>
        </form>
      </div>
    <?php endif; ?>
<?php require_once APP_ROOT . '/views/includes/footer.php' ?>
