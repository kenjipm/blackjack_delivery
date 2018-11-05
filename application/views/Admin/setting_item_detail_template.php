<div name="setting_item_detail_template" class="template">
	<form class="form-horizontal h-100 w-100" id="form_setting_item_detail" enctype="multipart/form-data">
		<input type="hidden" name="item_id"/>
		<div class="d-table h-100 w-100">
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-top">
					<div class="row">
						<div class="col-12">
							<nav class="navbar navbar-expand navbar-light bg-semilight">
								<h3 name="item_name">Edit Item</h3>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row">
				<div class="d-table-cell">
					<div class="position-relative h-100 overflow-y-auto">
						<div class="col-md-12 col-lg-6">
							<div class="form-group">
								<label for="item_image_file" class="control-label">
									<img alt="" src="" class="img-fluid rounded pb-2" name="item_image"/>
									<br/>
									<span class="btn btn-success" id="btn_upload_photo">Ubah Foto</span>
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
								<textarea rows=5 class="form-control" name="item_description_long"></textarea>
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
						<nav class="navbar navbar-expand navbar-light bg-success w-50 nopadding">
							<button type="button" name="btn_save" class="btn btn-success btn-lg w-100" id="btn_save">Simpan</button>
						</nav>
						<nav class="navbar navbar-expand navbar-light bg-semilight w-25 nopadding">
							<button type="button" name="btn_back" class="btn btn-default btn-lg bg-semilight w-100" id="btn_back">Kembali</button>
						</nav>
						<nav class="navbar navbar-expand navbar-light bg-danger w-25 nopadding">
							<button type="button" name="btn_delete" class="btn btn-danger btn-lg w-100" id="btn_delete">Hapus</button>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>