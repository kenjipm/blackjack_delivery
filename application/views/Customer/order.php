<div class="row h-100">
	<div class="col-12 col-md-4 h-100 nopadding" id="first_frame">
		<div class="p-0 h-100 w-100 d-table" id="order_main">
			<div class="d-table-row row-fit">
				<div class="d-table-cell">
					<div class="">
						<div class="col-12 nopadding">
							<nav class="navbar navbar-expand navbar-light bg-semilight">
								<div class="col-12">
									<div class="row">
										<div class="col-2">
											<div class="collapse navbar-collapse" id="navbarNavDropdown">
												<ul class="navbar-nav">
													<li class="nav-item dropdown">
														<a class="nav-link" href="#" id="navbarDropdownMenuAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="fas fa-list"></span>
														</a>
														<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAdmin">
															<button id="btn_hitung-2" type="button" class="dropdown-item">Hitung Pesanan</button>
															<div class="dropdown-divider"></div>
															<button id="btn_help" type="button" class="dropdown-item">Bantuan</button>
														</div>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-10">
											<div class="input-group">
												<input type="text" id="search_input" class="form-control"/>
												<div class="input-group-append">
													<button type="button" class="btn btn-default" id="btn_search"><span class="fas fa-search"></span></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="d-table-row">
				<div class="d-table-cell align-top">
					<div class="position-relative h-100 overflow-y-auto">
						<form id="item_list_form">
							<ul id="item_list" class="list-group list-group-flush"></ul>
						</form>
					</div>
				</div>
			</div>
			<div class="d-table-row row-fit">
				<div class="d-table-cell align-bottom">
					<div class="row nopadding">
						<nav class="navbar navbar-expand navbar-light bg-success w-100 nopadding ">
							<button type="button" class="btn btn-success btn-lg w-100" id="btn_hitung">Hitung</button>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-8 h-100 nopadding" id="second_frame">
		<div class="p-0 h-100 w-100 d-table">
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