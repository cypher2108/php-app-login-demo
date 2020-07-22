<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
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
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'index.php/auth/logout' ?>">Logout</a></li>
		</ul>
	</div>
</nav>

<div class="col-lg-5 col-lg-offset-2">
	<h1>Profile Page</h1>
	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
	<?php } ?>
	<hr>

	<h3>Hello <?php echo $_SESSION['username']; ?></h3>

	<br><br>

	<a href="<?php echo base_url() . 'index.php/auth/logout' ?>">Logout</a>

</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>

