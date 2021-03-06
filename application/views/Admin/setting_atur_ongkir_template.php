<div name="setting_atur_ongkir_template" class="template">
	<form class="form-horizontal h-100 w-100" id="form_atur_ongkir_detail">
		<div class="d-table h-100 w-100">
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-top">
					<div class="row">
						<div class="col-12">
							<nav class="navbar navbar-expand navbar-light bg-semilight">
								<h3>Atur Ongkir</h3>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row">
				<div class="d-table-cell">
					<div class="position-relative h-100 overflow-y-auto">
						<div class="col-md-12 col-lg-6">
							<div class="form-group mt-2">
								<label for="minimum_order" class="control-label">Minimum Belanja</label>
								<input type="text" class="form-control" name="minimum_order"/>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="free_value" class="control-label">Free Ongkir</label>
										<input type="text" class="form-control" name="free_value"/>
									</div>
								<div class="col-6">
								</div>
									<div class="form-group">
										<label for="per_price" class="control-label">per Belanja</label>
										<input type="text" class="form-control" name="per_price"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="maximum_free" class="control-label">Maksimum Free Ongkir</label>
								<input type="text" class="form-control" name="maximum_free"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-bottom">
					<div class="row nopadding">
						<div class="col-12">
							<div class="txt-success" name="success_message"></div>
							<div class="txt-danger" name="failure_message"></div>
						</div>
						<nav class="navbar navbar-expand navbar-light bg-success col-6 col-md-12 nopadding">
							<button type="button" name="btn_save" class="btn btn-success btn-lg w-100" id="btn_hitung">Simpan</button>
						</nav>
						<nav class="navbar navbar-expand navbar-light bg-semilight col-6 d-sm-block d-md-none nopadding">
							<button type="button" name="btn_back" class="btn btn-default btn-lg bg-semilight w-100" id="btn_hitung">Kembali</button>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>