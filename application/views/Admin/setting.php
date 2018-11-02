<div class="row h-100">
	<div class="col-12 col-md-4 h-100">
		<div class="p-1 border rounded h-100 d-table col-12" id="setting_main">
			<div class="d-table-row row-fit">
				<div class="d-table-cell">
					<div class="row">
						<div class="col">
							<nav class="navbar navbar-expand navbar-light bg-light">
								<div class="collapse navbar-collapse" id="navbarNavDropdown">
									<ul class="navbar-nav">
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="fas fa-list"></span>
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAdmin">
												<button id="btn_tambah_item" type="button" class="dropdown-item">Tambah Item</button>
												<button id="btn_atur_ongkir" type="button" class="dropdown-item">Atur Ongkir</button>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="<?=site_url('Admin/Logout')?>">Logout</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="input-group">
									<input type="text" id="search_input" class="form-control"/>
									<div class="input-group-append">
										<button type="button" class="btn btn-default"><span class="fas fa-search"></span></button>
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
							<ul id="item_list" class="list-group"></ul>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-8 h-100">
		<div class="p-1 border rounded h-100 d-table col-12">
			<div class="d-table-row">
				<div class="d-table-cell">
					<div class="position-relative h-100 overflow-y-auto">
						<div id="setting_detail" class="h-100">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>