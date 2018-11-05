<div name="setting_item_template" class="template">
	<li name="item" class="list-group-item">
		<input type="hidden" name="item_id"/>
		<div class="row">
			<div class="col-10">
				<label class="control-label" name="item_name"></label>
			</div>
			<div class="col-2">
				<button type="button" class="btn btn-warning" name="btn_edit">
					<span class="fas fa-edit" aria-hidden="true"></span>
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-4 col-md-12 col-xl-4">
				<input type="text" name="item_price" class="form-control"/>
			</div>
			<div class="col-6 col-md-10 col-xl-6 align-right input-group">
				<div class="input-group-prepend">
					<button type="button" class="btn btn-success" name="button-minus-stock"><span class="fas fa-minus" aria-hidden="true"></span></button>
				</div>
				<input type="text" class="form-control text-center" name="item_stock" value="0" readonly/>
				<div class="input-group-append">
					<button type="button" class="btn btn-success input-group-append" name="button-add-stock"><span class="fas fa-plus" aria-hidden="true"></span></button>
				</div>
			</div>
			<div class="col-2">
				<button type="button" class="btn btn-success" name="btn_save">
					<span class="fas fa-save" aria-hidden="true"></span>
				</button>
				<span class="txt-success" name="success_message"></span>
				<span class="txt-danger"  name="failure_message"></span>
			</div>
		</div>
	</li>
</div>