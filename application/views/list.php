<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://kit.fontawesome.com/08bbafbe03.js" crossorigin="anonymous"></script>
	<title>php App-View Book</title>
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

<div class="container" style="padding-top: 12px;">

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
	<?php } ?>

	<div class="row">
		<div class="col-md-12">
			<?php
			$success = $this->session->userdata('success');
			if ($success != ""){
				?>
				<div class="alert alert-success"><?php echo $success?></div>
				<?php
			}
			?>

			<?php
			$failure = $this->session->userdata('failure');
			if ($failure != ""){
				?>
				<div class="alert alert-success"><?php echo $failure?></div>
				<?php
			}
			?>
		</div>
	</div>
	<div class="row ">
		<div class="col-6" ><h3>View Books</h3></div>
		<div class="col-6 text-right"><a href="<?php echo base_url().'index.php/Book/add'; ?>" class="btn btn-primary">Add</a></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Author</th>
					<th>ISBN</th>
					<th width="100">Edit</th>
					<th width="100">Delete</th>
				</tr>

				<?php if (!empty($books)) {
					foreach ($books as $book) { ?>
						<tr>
							<td><?php echo $book['book_id'] ?></td>
							<td><?php echo $book['name'] ?></td>
							<td><?php echo $book['author'] ?></td>
							<td><?php echo $book['isbn_number'] ?></td>
							<td>
								<a href="<?php echo base_url().'index.php/Book/edit/'.$book['book_id'];?>"
								   class="btn btn-primary"><i class="fas fa-edit ">Edit</i></a>
							</td>

							<td>
								<a href="<?php echo base_url().'index.php/Book/delete/'.$book['book_id']?>"
								   class="btn btn-danger"><i class="fas fa-trash-alt ">Delete</i></a>
							</td>
						</tr>
					<?php }
				} else { ?>
					<tr>
						<td colspan="5"></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>

</div>
</body>
</html>
