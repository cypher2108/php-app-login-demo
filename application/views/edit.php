<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>php App-Update Book</title>
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">Php App</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myMenu">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="myMenu">
		<ul class="navbar-nav text-center ml-auto">
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'index.php/auth/logout' ?>">Logout</a></li>
		</ul>
	</div>
</nav>

<div class="container" style="padding-top: 10px;">
	<h3>Update Book</h3>

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
	<?php } ?>

	<hr>
	<form method="post" name="updateBook" action="<?php echo base_url() . 'index.php/Book/edit/'.$book['book_id']; ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo set_value('name', $book['name']) ?>" class="form-control">
					<?php echo form_error('name'); ?>
				</div>

				<div class="form-group">
					<label>Author</label>
					<input type="text" name="author" value="<?php echo set_value('author', $book['author']) ?>" class="form-control">
					<?php echo form_error('author'); ?>
				</div>

				<div class="form-group">
					<label>ISBN Number</label>
					<input type="text" name="isbn_number" value="<?php echo set_value('isbn_number', $book['isbn_number']) ?>" class="form-control">
					<?php echo form_error('isbn_number'); ?>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Update</button>
					<a href="<?php echo base_url() . 'index.php/Book/index'; ?>" class="btn-secondary btn">Cancel</a>
				</div>
			</div>
	</form>
</div>
</body>
</html>

