<div name="setting_item_detail_template" class="template">
	<div class="row justify-content-center">
		<div class="col-11">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="item_image_file" class="control-label">
						<img alt="" src="" class="img-thumbnail" name="item_image"/>
					</label>
					<input type="file" class="form-control" id="item_image_file" style="display: none"/>
				</div>
				<div class="form-group">
					<label for="item_image" class="control-label">Nama</label>
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
				<div class="form-group">
					<button id="btn_save" type="button" class="btn btn-primary">Simpan</button>
					<button id="btn_back" type="button" class="btn btn-default">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>