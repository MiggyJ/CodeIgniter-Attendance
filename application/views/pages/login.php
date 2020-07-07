
<?php if($error != ''):?>
	<div class="alert alert-warning" role="alert">
		<?php echo $error;?>
	</div>	
<?php endif;?>

<?php if(isset($_SESSION['user_registered'])):?>
	<div class="alert alert-success" role="alert">
		<?php echo $_SESSION['user_registered'];?>
	</div>
<?php endif; ?>

	<div class="container">
		<div class="row" style="margin-top: 10%;">
			<!-- Card Form -->
			<div class="card col-lg-4 col-md-6 offset-md-3 offset-lg-0">
				<div class="card-body">
					<h4 class="card-title">Log In for Attendance</h4>
					<?php echo form_open('')?>
						<div class="form-group">
							<label for="logNumber">Student Number</label>
							<input type="text" name="logNumber" class="form-control" id="logNumber">
							<?php echo form_error('logNumber');?>
						</div>
						<div class="form-group">
							<label for="logPassword">Password</label>
							<input type="password" name="logPassword" id="logPassword" class="form-control">
							<?php echo form_error('logPassword');?>
						</div>
						<button type="submit" class="btn btn-block btn-primary" id="logBtn" style="background: #563d7c">Log In</button>
					</form>
					<div class="text-center">
						<div>or</div>
						<a href="<?=base_url('register')?>">Sign Up</a>
					</div>
				</div>
			</div>
			<div class=" col-lg-8 d-none d-lg-flex flex-column align-items-center justify-content-center">
				<img src="assets/ci-logo-big.png">
				Powered by CodeIgniter
			</div>
		</div>
	</div>



