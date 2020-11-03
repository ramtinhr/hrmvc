<?php require_once APP_ROOT . '/views/includes/header.php'; ?>
  <div class="container margin-auto">
    <div class="m-t-30 p-l-0">
			<?php flash('post_message'); ?>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h1>Posts</h1>
      </div>
      <div class="col-md-6 display-flex justify-content-flex-end align-center">
        <a href="<?php echo APP_URL; ?>/posts/add" class="btn btn-primary font-size-16">
          <i class="fa fa-plus"></i>
          <span class="m-r-10">Add Post</span>
        </a>
      </div>
    </div>
		<?php foreach($data['posts'] as $post) : ?>
      <div class="display-flex border-lightgray flex-direction-column m-t-20 m-b-20 p-h-20 p-v-20">
        <h3 class="font-weight-bold m-t-0"><?php echo $post->title; ?></h3>
        <div class="badge-outline-dark">
          Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
        </div>
        <p class="text-dimlightGray"><?php echo $post->body; ?></p>
        <a href="<?php echo APP_URL; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-darkBlack text-center">More</a>
      </div>
		<?php endforeach; ?>
  </div>
<?php require_once APP_ROOT . '/views/includes/footer.php' ?>
