<div name="checkout_template" class="template">
	<form action="<?=site_url('Customer/order_via_whatsapp')?>" method="post" class="h-100" id="form_checkout">
		<input type="hidden" name="subtotal"/>
		<input type="hidden" name="free_ongkir"/>
		<div class="d-table h-100 w-100">
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-top">
					<div class="row">
						<div class="col-12">
							<nav class="navbar navbar-expand navbar-light bg-semilight">
								<h3>Review Pesanan</h3>
							</nav>
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
					<div class="col-12">
						<div class="form-group">
							<label for="customer_name">Nama</label>
							<input type="text" class="form-control" name="customer_name" placeholder="Nama...">
						</div>
						<div class="form-group">
							<label for="shipping_address">Alamat Kirim Lengkap</label>
							<input type="text" class="form-control" name="shipping_address" placeholder="Alamat Kirim...">
						</div>
						<div class="form-group">
							<div class="row">
								<label for="shipping_method" class="col-2 col-md-1 text-right">via</label>
								<div class="col-5 col-md-3">
									<select class="form-control" name="shipping_method">
										<option value="GOJEK" selected>Go-Jek</option>
										<option value="TIKI">TIKI</option>
										<option value="JnT">J&amp;T</option>
									</select>
								</div>
								<div class="col-5 col-md-8">
									<small>Go-Jek hanya untuk wilayah Bandung</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-bottom">
					<div class="row nopadding">
						<nav class="navbar navbar-expand navbar-light bg-success col-5 col-md-6 nopadding">
							<button name="btn_order_whatsapp" type="button" class="btn btn-success btn-lg w-100 h-100"><small class="small"><small>Pesan via WhatsApp</small></small></button>
						</nav>
						<nav class="navbar navbar-expand navbar-light bg-line_at col-4 col-md-6 nopadding">
							<button name="btn_order_line_at" type="button" class="btn btn-success btn-lg bg-line_at w-100 h-100"><small class="small"><small>Pesan via Line</small></small></button>
						</nav>
						<nav class="navbar navbar-expand navbar-light bg-semilight col-3 d-sm-block d-md-none nopadding">
							<button name="btn_back" type="button" class="btn btn-default btn-lg bg-semilight w-100 h-100"><small class="small"><small>Kembali</small></small></button>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</form>
	<form action="<?=site_url('customer/send_to_whatsapp')?>" method="post" id="form_send_to_whatsapp">
		<input type="hidden" name="message" />
	</form>
	<form action="<?=site_url('customer/send_to_line_at')?>" method="post" id="form_send_to_line_at">
		<input type="hidden" name="message" />
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