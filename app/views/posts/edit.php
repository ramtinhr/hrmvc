<?php require_once APP_ROOT . '/views/includes/header.php'; ?>
<div class="container m-h-auto m-t-30 box-shadow p-20">
	<div class="display-flex justify-content-start">
		<a href="<?php echo APP_URL; ?>/posts" class="btn btn-light">
			<i class="fa fa-arrow-left"></i>
			Back
		</a>
	</div>
	<h2>edit Post</h2>
	<p>Create a post with this form</p>
	<form action="<?php echo APP_URL; ?>/posts/edit/<?php echo $data['id']; ?>"  method="POST">
		<div class="form-group">
			<label for="title">Title: <sup>*</sup></label>
			<input type="text" name="title" id="title" value="<?php echo $data['title']; ?>">
			<span class="text-danger font-size-14"><?php echo $data['errors']['title'][0]; ?></span>
		</div>
		<div class="form-group">
			<label for="body">Body: <sup>*</sup></label>
			<textarea name="body" id="body" cols="30" rows="10"><?php echo $data['body']; ?></textarea>
			<span class="text-danger font-size-14"><?php echo $data['errors']['body'][0]; ?></span
		</div>
		<div class="col-md-2 m-t-10 p-l-0">
			<input type="submit" class="btn btn-success font-weight-bold border-none" name="submit" value="Submit">
		</div>
	</form>
</div>
<?php require_once APP_ROOT . '/views/includes/footer.php' ?>
