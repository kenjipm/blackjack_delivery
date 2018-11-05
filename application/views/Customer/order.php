<div class="row h-100">
	<div class="col-12 col-md-4 h-100">
		<div class="p-1 border rounded h-100 d-table col-12" id="order_main">
			<div class="d-table-row row-fit">
				<div class="d-table-cell">
					<nav class="navbar navbar-expand navbar-light bg-light">
						<div class="input-group pb-1">
							<input type="text" id="search_input" class="form-control"/>
							<div class="input-group-append">
								<button type="button" class="btn btn-default" id="btn_search"><span class="fas fa-search"></span></button>
							</div>
						</div>
					</nav>
				</div>
			</div>
			<div class="d-table-row">
				<div class="d-table-cell align-top">
					<div class="position-relative h-100 overflow-y-auto">
						<form id="item_list_form">
							<ul id="item_list" class="list-group"></ul>
						</form>
					</div>
				</div>
			</div>
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-bottom">
				<nav class="navbar navbar-expand navbar-light bg-light">
					<button type="button" class="btn btn-success w-100" id="btn_hitung">Hitung</button>
				</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-8 h-100">
		<div class="p-1 border rounded h-100 d-table col-12">
			<div class="d-table-row">
				<div class="d-table-cell">
					<div class="position-relative h-100 overflow-y-auto">
						<div id="order_detail" class="h-100">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>