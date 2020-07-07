<?php

	if(!isset($_SESSION['studentNumber'])){
		header('location: ' . base_url());
	}

?>

<?php if(isset($_SESSION['image'])): ?>

<div class="alert alert-success" role="alert">
	You have submitted your attendance
</div>

<?php endif; ?>
<?php if(isset($_SESSION['upload_error'])):?>
	<div class="alert alert-danger" role="alert">
		<?php echo $_SESSION['upload_error']['error']?>
	</div>
<?php endif; ?>

<div class="container">
	<div class="row d-flex flex-column justify-content-center align-items-center" style="margin-top: 5%;">
		<div class="card">
			<?php if(isset($_SESSION['image'])):?>
			<div class="card-header">
				<h2>Your Photo</h2>
			</div>
			<img src="<?=base_url('/uploads/'.$_SESSION['image'])?>" class="card-img-top" style="max-width: 250px; max-height: 400px;">
			<?php else: ?>
			<div class="card-header">
				<h2>Upload Proof</h2>
			</div>
			<?php echo form_open_multipart('user/submitAttendance'); ?>
				<div class="form-group">
					<label>
						<input type="file" name="a_Proof" id="a_Proof" accept="image/*" style="opacity: 0; position:absolute">
						<img src="<?=base_url('assets/Camera.png')?>" alt="nice" id="previewImage" class="card-img-top" style="max-width: 250px; max-height: 400px;">
					</label>
				</div>
			<?php endif; ?>
			<div class="card-footer d-flex justify-content-center">
				<?php if(isset($_SESSION['image'])): ?>
				<p>Submitted at <?php echo $_SESSION['time'];?></p>
				<?php else: ?>
				<button class="btn btn-primary float-right" id="proofBtn" style="background: #563d7c">Submit</button>
				<?php endif; ?>
			</div>
			</form>
		</div>
	</div>
</div>