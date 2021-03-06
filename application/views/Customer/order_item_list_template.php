<div name="item_template" class="template">
	<li name="item" class="list-group-item">
		<input type="hidden" name="item_id"/>
		<input type="hidden" name="item_price"/>
		<input type="hidden" name="item_stock"/>
		<div class="row">
			<div class="col-3">
				<img class="img-fluid rounded" name="item_image"/>
			</div>
			<div class="col-9">
				<div class="row">
					<div class="col-7 col-md-12 col-xl-8">
						<h6 name="item_name"></h6>
						<div name="item_price_str"></div>
					</div>
					<div class="col-5 col-md-12 col-xl-4 text-right">
						<span class="badge badge-primary" name="badge_item_is_new">NEW</span>
						<span class="badge badge-danger" name="badge_item_is_best_seller">BEST SELLER</span>
						<span class="badge badge-warning" name="badge_item_is_habis">HABIS</span>
					</div>
				</div>
				<div class="row">
					<div class="col-12"><small class="text-muted" name="item_description_long"></small></div>
				</div>
				<div class="row justify-content-end">
					<div class="col-8 col-md-12 col-xl-8 input-group">
						<div class="input-group-prepend">
							<button type="button" class="btn btn-success" name="button-minus-quantity"><span class="fas fa-minus" aria-hidden="true"></span></button>
						</div>
						<input type="text" class="form-control text-center h-100" name="item_quantity" value="0" readonly/>
						<div class="input-group-append">
							<button type="button" class="btn btn-success input-group-append" name="button-add-quantity"><span class="fas fa-plus" aria-hidden="true"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</li>
</div>