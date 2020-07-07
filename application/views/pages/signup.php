	<a href="<?=base_url()?>">Go Back</a>
	<div class="container">
		<div class="card col-lg-8 offset-lg-2">
			<div class="card-body">
			<?php echo form_open('register')?>
				<div class="form-group">
					<label for="signFirstName">First Name</label>
					<input type="text" class="form-control" name="sFirstName" id="signFirstName">
					<?php echo form_error('sFirstName');?>
				</div>
				<div class="form-group">
					<label for="signLastName">Last Name</label>
					<input type="text" class="form-control" name="sLastName" id="signLastName">
					<?php echo form_error('sLastName');?>
				</div>
				<div class="form-group">
					<label for="signNumber">Student Number <small id="numberHelp" class="text-muted">(e.g. 2018-00057)</small></label>
					<input type="text" class="form-control" name="sNumber" id="signNumber" >
					<?php echo form_error('sNumber');?>
				</div>
				<div class="form-group">
					<select id="signSection" class="custom-select form-control" name="sSection">
						<option value="BSIT 2-1">BSIT 2-1</option>
						<option value="BSIT 2-2">BSIT 2-2</option>
					</select>
				</div>
				<div class="form-group">
					<label for="signPassword">Password</label>
					<input type="password" class="form-control" name="sPassword" id="signPassword">
					<?php echo form_error('sPassword');?>
				</div>
				<div class="form-group">
					<label for="signPassword2">Confirm Password</label>
					<input type="password" class="form-control" name="sPassword2" id="signPassword2">
					<?php echo form_error('sPassword2');?>
				</div>
				<button type="submit" class="btn btn-primary btn-block" style="background: #563d7c">Sign Up</button>
			</form>
			</div>
		</div>
	</div>