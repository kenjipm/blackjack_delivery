<div name="setting_tambah_item_template" class="template">
	<form class="form-horizontal h-100" id="form_tambah_item_detail" enctype="multipart/form-data">
		<div class="d-table h-100 w-100">
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-top">
					<div class="row">
						<div class="col-12">
							<nav class="navbar navbar-expand navbar-light bg-semilight">
								<h3>Tambah Item</h3>
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
								<label for="item_image_file" class="control-label">
									<img alt="" src="" class="img-fluid rounded pb-2" name="item_image"/>
									<span class="btn btn-success" id="btn_upload_photo">Upload Foto</span>
								</label>
								<input type="file" class="form-control" id="item_image_file" name="item_image_file" accept="image/*" style="display: none"/>
							</div>
							<div class="form-group">
								<label for="item_name" class="control-label">Nama</label>
								<input type="text" class="form-control" name="item_name"/>
							</div>
							<div class="form-group">
								<label for="item_sub_name_1" class="control-label">Sub Nama 1</label>
								<input type="text" class="form-control" name="item_sub_name_1"/>
							</div>
							<div class="form-group">
								<label for="item_sub_name_2" class="control-label">Sub Nama 2</label>
								<input type="text" class="form-control" name="item_sub_name_2"/>
							</div>
							<div class="form-group">
								<label for="item_description_long" class="control-label">Deskripsi</label>
								<textarea class="form-control" name="item_description_long"></textarea>
							</div>
							<div class="form-group form-check">
								<div class="row">
									<div class="col-auto">
										<input type="checkbox" class="form-check-input" id="item_is_new" name="item_is_new" value="1">
										<label class="form-check-label" for="item_is_new">Baru</label>
									</div>
									<div class="col-auto">
										<input type="checkbox" class="form-check-input" id="item_is_best_seller" name="item_is_best_seller" value="1">
										<label class="form-check-label" for="item_is_best_seller">Best Seller</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="item_price" class="control-label">Harga</label>
								<input type="text" class="form-control" name="item_price"/>
							</div>
							<div class="form-group">
								<label for="item_stock" class="control-label">Stok</label>
								<input type="text" class="form-control" name="item_stock"/>
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
							<button type="button" name="btn_save" class="btn btn-success btn-lg w-100" id="btn_save">Tambah</button>
						</nav>
						<nav class="navbar navbar-expand navbar-light bg-semilight col-6 d-sm-block d-md-none nopadding">
							<button type="button" name="btn_back" class="btn btn-default btn-lg bg-semilight w-100" id="btn_back">Kembali</button>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>