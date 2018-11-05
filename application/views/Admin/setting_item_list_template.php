<div name="setting_item_template" class="template">
	<li name="item" class="list-group-item">
		<form>
			<input type="hidden" name="item_id"/>
			<div class="row">
				<div class="col-10 col-sm-10 col-md-8 col-xl-10">
					<label class="control-label"><h6 name="item_name"></h6></label>
				</div>
				<div class="col-2 col-sm-2 col-md-4 col-xl-2">
					<button type="button" class="btn btn-warning col-12" name="btn_edit">
						<small><span class="fas fa-edit" aria-hidden="true"></span></small>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-4 col-sm-4 col-md-12 col-xl-4">
					<input type="text" name="item_price" class="form-control"/>
				</div>
				<div class="col-6 col-sm-6 col-md-8 col-xl-6 align-right input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-success" name="button-minus-stock"><span class="fas fa-minus" aria-hidden="true"></span></button>
					</div>
					<input type="text" class="form-control text-center h-100" name="item_stock" value="0" readonly/>
					<div class="input-group-append">
						<button type="button" class="btn btn-success input-group-append" name="button-add-stock"><span class="fas fa-plus" aria-hidden="true"></span></button>
					</div>
				</div>
				<div class="col-2 col-sm-2 col-md-4 col-xl-2">
					<button type="button" class="btn btn-success col-12" name="btn_save">
						<small><span class="fas fa-save" aria-hidden="true"></span></small>
					</button>
				</div>
			</div>
		</form>
	</li>
</div>