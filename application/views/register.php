<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">Php App</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myMenu">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="myMenu">
		<ul class="navbar-nav text-center ml-auto">
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'index.php/auth/login' ?>">Login</a></li>
		</ul>
	</div>
</nav>

<div class="col-lg-5 col-lg-offset-2">
	<h1>Register Page</h1>
	<p>Fill in the details to Register</p>

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
	<?php } ?>
	<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
	<form action="" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" name="username" id="username" type="text">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" name="email" id="email" type="text">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" name="password" id="password" type="password">
		</div>

		<div class="form-group">
			<label for="password">Confirm Password</label>
			<input class="form-control" name="password2" id="password" type="password">
		</div>

		<div class="form-group">
			<label for="gender">Gender</label>
			<select class="form-control" id="gender" name="gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>

		<div class="form-group">
			<label for="phone" class="label-default">Contact</label>
			<input class="form-control" name="phone" id="phone" type="text">
		</div>

		<div>
			<button class="btn btn-primary" name="register">Register</button>
		</div>

	</form>


</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>

