<div class="row justify-content-center mt-5">
	<div class="col-6 col-lg-3">
		<div class="card">
			<div class="card-body">
				<form class="form-horizontal" action="<?=site_url("Admin/Validate")?>">
					<div class="form-group">
						<label for="username" class="control-label">Username</label>
						<input type="text" name="username" class="form-control"/>
					</div>
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input type="password" name="password" class="form-control"/>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>