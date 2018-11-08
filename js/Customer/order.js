$(document).ready(function(){
	bind_search_input();
	bind_btn_search();
	load_item_list();
	bind_btn_hitung();
	bind_btn_help();
});

function bind_search_input() {
	$("#search_input").on("keypress", function(e){
		if(e.keyCode == 13) {
			$("#btn_search").click();
		}
	});
}

function bind_btn_hitung() {
	$("#btn_hitung, #btn_hitung-2").on("click", function(){
		load_checkout();
	});
}

function bind_btn_help() {
	$("#btn_help").on("click", function(){
		prepare_second_frame();
		load_help();
	});
}

function bind_btn_search() {
	$("#btn_search").on("click", function(){
		var search_terms = $("#search_input").val();
		clear_item_list();
		load_item_list(search_terms);
	});
}

function clear_item_list() {
	$("#item_list").html("");
}

function prepare_second_frame() {
	$("#second_frame").show();
	scrollToElement("#second_frame");
}

function back_to_first_frame() {
	scrollTop();
	$("#second_frame").hide(500);
}

function load_item_list(search_terms) {
	if (search_terms == undefined) search_terms = "";
	$.ajax({
		type: "POST",
		url: base_url + "/Customer/load_order_item_list/",
		data:
		{
			search_terms: search_terms
		},
		success: function(result) {
			if (result.err == 0) {
				back_to_first_frame();
				result.items.forEach(function(item){
					var template = $("[name='item_template']").html();
					$(template).attr("item_id", item.id).appendTo("#item_list");
					var element = $("#item_list [name='item'][item_id=" + item.id + "]");
					
					element.find("[name='item_id']").val(item.id);
					element.find("[name='item_price']").val(item.price);
					element.find("[name='item_image']").attr("src", item.image_path);
					element.find("[name='item_name']").html(item.name);
					element.find("[name='item_description_long']").html(item.description_long);
					element.find("[name='item_price_str']").html(item.price_str);
					element.find("[name='item_stock']").val(item.stock);
					
					element.find("[name='item_image'], [name='item_name'], [name='item_description_long'], [name='item_price_str']").on("click", function(){
						prepare_second_frame();
						load_item_detail(item.id);
					});
					
					process_item_is_habis(item.id, item.stock);
					process_item_is_new(item.id, item.is_new);
					process_item_is_best_seller(item.id, item.is_best_seller);
					
					function check_add_quantity() { // disable kalo quantity lebih besar
						element.find("[name=button-add-quantity]").prop("disabled", (cur_quantity >= max_quantity));
						element.find("[name=button-minus-quantity]").prop("disabled", (cur_quantity <= 0));
					}
					
					var cur_quantity = parseInt(element.find("[name='item_quantity']").val());
					element.find("[name=button-minus-quantity]").on("click", function(){
						if (cur_quantity > 0) element.find("[name='item_quantity']").val(--cur_quantity);
						check_add_quantity();
					});
					
					var max_quantity = parseInt(item.stock);
					element.find("[name=button-add-quantity]").on("click", function(){
						if (cur_quantity < max_quantity) element.find("[name='item_quantity']").val(++cur_quantity);
						check_add_quantity();
					});
					
					check_add_quantity();
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
		url: base_url + "/Customer/load_order_item_detail/",
		data:
		{
			id: item_id
		},
		success: function(result) {
			if (result.err == 0) {
				$("#order_detail").html("");
				
				var template = $("[name='item_detail_template']").html();
				$(template).appendTo("#order_detail");
				var element = $("#order_detail");
				
				element.find("[name='item_image']").attr("src", result.item.image_path);
				element.find("[name='item_name']").html(result.item.name);
				element.find("[name='item_price_str']").html(result.item.price_str);
				element.find("[name='item_description_long']").html(result.item.description_long);
	
				element.find("[name='btn_back']").on("click", function(){
					back_to_first_frame();
				});
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}

function load_checkout() {
	$("#order_detail").html("");
	
	var total_order = 0;
	var order_items = [];
	$("[name=item]").each(function(i){
		var item_quantity = parseInt($(this).find("[name=item_quantity]").val());
		if (item_quantity > 0) {
			var item_id = $(this).find("[name=item_id]").val();
			order_items.push({
				id: item_id,
				quantity: item_quantity
			});
		}
	});
	
	if (order_items.length > 0) {
		scrollToElement("#order_detail");
		$.ajax({
			type: "POST",
			url: base_url + "/Customer/load_checkout_summary/",
			data:
			{
				items: order_items
			},
			success: function(result) {
				if (result.err == 0) {
					prepare_second_frame();
					var template = $("[name='checkout_template']").html();
					$(template).appendTo("#order_detail");
					var element = $("#order_detail");
					
					result.summary.items.forEach(function(item) {
						var checkout_item_template = $("[name='checkout_item_template']").html();
						$(checkout_item_template).attr("item_id", item.id).appendTo("#order_detail [name=item_list]");
						var element = $("#order_detail [name=item_list] [name='item'][item_id=" + item.id + "]");

						element.find("[name='item_id']").val(item.id);
						element.find("[name='item_price']").val(item.price);
						element.find("[name='item_total']").val(item.total);
						
						total_order += parseInt(item.total);
						
						element.find("[name='item_name']").html(item.name);
						element.find("[name='item_quantity']").html(item.quantity);
						element.find("[name='item_price_str']").html(item.price_str);
						element.find("[name='item_total_str']").html(item.total_str);
					});
					
					element.find("[name='subtotal']").val(result.summary.subtotal);
					element.find("[name='subtotal_str']").html(result.summary.subtotal_str);
					element.find("[name='free_ongkir']").val(result.summary.free_ongkir);
					element.find("[name='free_ongkir_str']").html(result.summary.free_ongkir_str);
	
					element.find("[name='btn_order_whatsapp']").on("click", function(){
						order_do_whatsapp();
					});
	
					element.find("[name='btn_order_line_at']").on("click", function(){
						order_do_line_at();
					});
	
					element.find("[name='btn_back']").on("click", function(){
						back_to_first_frame();
					});
				} else if (result.err == 1) {
					alert('Server error');
				}
			}
		});
	} else {
		alert("Silakan pilih barang yang mau dipesan terlebih dahulu");
	}
}

function load_help() {
	$("#order_detail").html("");
	
	var template = $("[name='order_help_template']").html();
	$(template).appendTo("#order_detail");
	var element = $("#order_detail");
	
	element.find("[name='btn_back']").on("click", function(){
		back_to_first_frame();
	});
}

function order_do_whatsapp() {
	order_do("whatsapp");
}

function order_do_line_at() {
	order_do("line_at");
}

function order_do(via) {
	var order_items = [];
	$("#form_checkout [name='item']").each(function(i){
		var item_quantity = parseInt($(this).find("[name=item_quantity]").html());
		if (item_quantity > 0) {
			var item_id = $(this).find("[name=item_id]").val();
			order_items.push({
				id: item_id,
				quantity: item_quantity
			});
		}
	});
	var customer_name = $("#form_checkout [name='customer_name']").val();
	var shipping_address = $("#form_checkout [name='shipping_address']").val();
	var shipping_method = $("#form_checkout [name='shipping_method']").val();
	
	if (customer_name == "") {
		alert("Silakan masukkan nama");
	}
	else if (shipping_address == "") {
		alert("Silakan masukkan alamat kirim");
	}
	else if (order_items.length <= 0) {
		alert("Silakan pilih barang yang mau dipesan terlebih dahulu");
	} else {
		$.ajax({
			type: "POST",
			url: base_url + "/Customer/order_do/",
			data:
			{
				customer_name: customer_name,
				shipping_address: shipping_address,
				shipping_method: shipping_method,
				items: order_items,
				via: via
			},
			success: function(result) {
				if (result.err == 0) {
					if (via == "whatsapp") {
						send_to_whatsapp(result.generated_message);
					} else if (via == "line_at") {
						send_to_line_at(result.generated_message);
					}
					
				} else if (result.err == 1) {
					alert('Server error');
				} else if (result.err == 2) {
					alert('Data error');
				}
			}
		});
	}
}

function send_to_whatsapp(message) {
	$("#form_send_to_whatsapp [name=message]").val(message);
	$("#form_send_to_whatsapp").submit();
}

function send_to_line_at(message) {
	$("#form_send_to_line_at [name=message]").val(message);
	$("#form_send_to_line_at").submit();
}

function process_item_is_habis(item_id, item_stock) {
	if (item_stock > 0) {
		$("#item_list [name='item'][item_id=" + item_id + "] [name=badge_item_is_habis]").hide();
	}
}

function process_item_is_new(item_id, item_is_new) {
	if (item_is_new == "0") {
		$("#item_list [name='item'][item_id=" + item_id + "] [name=badge_item_is_new]").hide();
	}
}

function process_item_is_best_seller(item_id, item_is_best_seller) {
	if (item_is_best_seller == "0") {
		$("#item_list [name='item'][item_id=" + item_id + "] [name=badge_item_is_best_seller]").hide();
	}
}