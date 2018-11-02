<div name="checkout_template" class="template">
	<form action="<?=site_url('Customer/order_via_whatsapp')?>" method="post" class="h-100">
		<input type="hidden" name="subtotal"/>
		<input type="hidden" name="free_ongkir"/>
		<div class="d-table h-100 w-100">
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-top">
					<div class="row">
						<div class="col-12">
							<h2>Review Pesanan</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row">
				<div class="d-table-cell">
					<div class="position-relative h-100 overflow-y-auto border rounded p-2">
						<div class="d-table h-100 w-100">
							<div class="d-table-row">
								<div class="d-table-cell align-top">
									<div class="col-12">
										<div name="item_list"></div>
										<hr/>
										<div class="col-12 text-right">
											<h3>Subtotal:&nbsp;<span name="subtotal_str"></span></h3>
											<small class="text-muted">Subtotal belum termasuk ongkir.<br/>Informasi ongkir akan dikirimkan via WhatsApp.</small>
										</div>
									</div>
								</div>
							</div>
							<div class="d-table-row row-fit">
								<div class="d-table-cell align-bottom">
									<div class="col-12 text-right">
										<hr/>
										<span class="fa fa-info mr-2"></span>Free ongkir hingga:&nbsp;<span name="free_ongkir_str"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-bottom">
					<div class="form-group">
						<label for="customer_name">Nama</label>
						<input type="text" class="form-control" id="customer_name" placeholder="Nama...">
					</div>
					<div class="form-group">
						<label for="shipping_address">Alamat Kirim</label>
						<input type="text" class="form-control" id="shipping_address" placeholder="Alamat Kirim...">
					</div>
					<div class="form-group">
						<div class="row">
							<label for="shipping_method" class="col-2 col-md-1 text-right">via</label>
							<div class="col-4 col-md-3">
								<select class="form-control">
									<option value="GOJEK" selected>Go-Jek</option>
									<option value="TIKI">TIKI</option>
									<option value="JnT">J&T </option>
								</select>
							</div>
							<div class="col-6 col-md-8">
								<small>Go-Jek hanya untuk wilayah Bandung</small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-bottom">
					<nav class="navbar navbar-expand navbar-light bg-light">
						<button type="submit" class="btn btn-success w-100">Pesan via WhatsApp</button>
					</nav>
				</div>
			</div>
		</div>
	</form>
</div>

<div name="checkout_item_template" class="template">
	<div name="item" class="row">
		<input type="hidden" name="item_id"/>
		<input type="hidden" name="item_price"/>
		<input type="hidden" name="item_total"/>
		<div class="col-12 col-md-7 text-right">
			<h5 name="item_name"></h5>
		</div>
		<div class="col-12 col-md-5 text-right">
			<span name="item_quantity"></span>
			X
			<span name="item_price_str"></span>
			=
			<span name="item_total_str"></span>
		</div>
	</div>
</div>