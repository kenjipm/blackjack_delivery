<div name="setting_tambah_item_template" class="template">
	<form class="form-horizontal h-100" id="form_tambah_item_detail">
		<div class="d-table h-100 w-100">
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-top">
					<div class="row">
						<div class="col-12">
							<nav class="navbar navbar-expand navbar-light bg-light">
								<h2>Tambah Item</h2>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row">
				<div class="d-table-cell">
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="form-group">
								<label for="item_image_file" class="control-label">
									<span class="btn btn-success" id="btn_upload_photo">Upload Foto</span>
								</label>
								<input type="file" class="form-control" id="item_image_file" name="item_image_file" style="display: none"/>
							</div>
							<div class="form-group">
								<label for="item_name" class="control-label">Nama</label>
								<input type="text" class="form-control" name="item_name"/>
							</div>
							<div class="form-group">
								<label for="item_description_long" class="control-label">Deskripsi</label>
								<textarea class="form-control" name="item_description_long"></textarea>
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
					<nav class="navbar navbar-expand navbar-light bg-light">
						<button name="btn_save" type="button" class="btn btn-primary w-50">Simpan</button>
						<button name="btn_back" type="button" class="btn btn-default w-50">Kembali</button>
					</nav>
				</div>
			</div>
		</div>
	</form>
</div>