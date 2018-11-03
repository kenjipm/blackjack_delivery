$(document).ready(function(){
	bind_btn_tambah_item();
	bind_btn_atur_ongkir();
	load_item_list();
});

function bind_btn_tambah_item() {
	$("#btn_tambah_item").on("click", function(){
		scrollTo("#setting_detail");
		load_tambah_item();
	});
}

function bind_btn_atur_ongkir() {
	$("#btn_atur_ongkir").on("click", function(){
		scrollTo("#setting_detail");
		load_atur_ongkir();
	});
}

function load_item_list() {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/load_item_list/",
		data:
		{
			
		},
		success: function(result) {
			if (result.err == 0) {
				scrollTop();
				$("#item_list").html("");
				result.items.forEach(function(item){
					var template = $("[name='setting_item_template']").html();
					$(template).attr("item_id", item.id).appendTo("#item_list");
					var element = $("#item_list [name='item'][item_id=" + item.id + "]");
					
					element.find("[name='item_id']").val(item.id);
					element.find("[name='item_price']").val(item.price);
					element.find("[name='item_name']").html(item.name);
					element.find("[name='item_stock']").val(item.stock);
					
					element.find("[name='btn_edit']").on("click", function(){
						scrollTo("#setting_detail");
						load_item_detail(item.id);
					});
					
					element.find("[name=button-minus-stock]").on("click", function(){
						element.find("[name='item_stock']").val(cur_quantity - 1);
					});
					
					element.find("[name=button-add-stock]").on("click", function(){
						element.find("[name='item_stock']").val(cur_quantity + 1);
					});
				});
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}

function load_item_detail(item_id) {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/load_item_detail/",
		data:
		{
			id: item_id
		},
		success: function(result) {
			if (result.err == 0) {
				$("#setting_detail").html("");
				
				var template = $("[name='setting_item_detail_template']").html();
				$(template).appendTo("#setting_detail");
				var element = $("#setting_detail");
				
				element.find("[name='item_image']").attr("src", result.item.image);
				element.find("[name='item_name']").val(result.item.name);
				element.find("[name='item_price']").val(result.item.price);
				element.find("[name='item_stock']").val(result.item.stock);
				element.find("[name='item_description_long']").val(result.item.description_long);
	
				element.find("[name='btn_save']").on("click", function(){
					update_item_do();
					load_item_list();
				});
	
				element.find("[name='btn_back']").on("click", function(){
					scrollTop();
				});
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}

function load_tambah_item() {
	$("#setting_detail").html("");
	
	var template = $("[name='setting_tambah_item_template']").html();
	$(template).appendTo("#setting_detail");
	var element = $("#setting_detail");
	
	element.find("[name='btn_save']").on("click", function(){
		tambah_item_do();
		load_item_list();
	});
	
	element.find("[name='btn_back']").on("click", function(){
		scrollTop();
	});
}

function load_atur_ongkir(item_id) {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/load_atur_ongkir/",
		data:
		{
			id: item_id
		},
		success: function(result) {
			if (result.err == 0) {
				$("#setting_detail").html("");
				
				var template = $("[name='setting_atur_ongkir_template']").html();
				$(template).appendTo("#setting_detail");
				var element = $("#setting_detail");
				
				element.find("[name='minimum_order']").val(result.ongkir.minimum_order);
				element.find("[name='free_value']").val(result.ongkir.free_value);
				element.find("[name='per_price']").val(result.ongkir.per_price);
				element.find("[name='maximum_free']").val(result.ongkir.maximum_free);
	
				element.find("[name='btn_save']").on("click", function(){
					atur_ongkir_do();
					load_item_list();
				});
				
				element.find("[name='btn_back']").on("click", function(){
					scrollTop();
				});
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}

function update_item_do() {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/update_item_do/",
		data: $("#form_setting_item_detail").serialize(),
		success: function(result) {
			if (result.err == 0) {
				
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}

function tambah_item_do() {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/create_item_do/",
		data: $("#form_tambah_item_detail").serialize(),
		success: function(result) {
			if (result.err == 0) {
				
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}

function atur_ongkir_do() {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/create_ongkir_setting_do/",
		data: $("#form_atur_ongkir_detail").serialize(),
		success: function(result) {
			if (result.err == 0) {
				
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}