<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
	<title>Attendance Admin</title>
	<?php else:?>
	<title>Attendance with CodeIgniter</title>
	<?php endif; ?>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<link rel="shortcut icon" href="<?=base_url('assets/ci-logo-white.png')?>" type="image/x-icon">
</head>
<body>
	<nav class="navbar navbar-dark" style="background: #563d7c">
		<div class="navbar-brand">
		<?php if (!isset($_SESSION['studentName'])):?>
			<h5>Attendance with <img src="<?=base_url('assets/ci-logo-white.png')?>" height="30px;" style="margin-top: -10px; margin-right: -5px;"> Code<strong>Igniter</strong></h5>
		</div>
		<?php else:?>
				<h5>Hello, <?php echo $_SESSION['studentName']?></h5>
			</div>
			<ul class="navbar-nav navbar-right">
				<li class="nav-item">
					<a href="<?=base_url()?>logout" class="nav-link">Log Out</a>
				</li>
			</ul>
		<?php endif?>	
	</nav>