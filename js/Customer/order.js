$(document).ready(function(){
	load_item_list();
	bind_btn_hitung();
});

function bind_btn_hitung() {
	$("#btn_hitung").on("click", function(){
		load_checkout();
	});
}

function load_item_list() {
	$.ajax({
		type: "POST",
		url: base_url + "/Customer/load_order_item_list/",
		data:
		{
			
		},
		success: function(result) {
			if (result.err == 0) {
				scrollTop();
				$("#item_list").html("");
				result.items.forEach(function(item){
					var template = $("[name='item_template']").html();
					$(template).attr("item_id", item.id).appendTo("#item_list");
					var element = $("#item_list [name='item'][item_id=" + item.id + "]");
					
					element.find("[name='item_id']").val(item.id);
					element.find("[name='item_price']").val(item.price);
					element.find("[name='item_image']").attr("src", item.image);
					element.find("[name='item_name']").html(item.name);
					element.find("[name='item_description_long']").html(item.description_long);
					element.find("[name='item_price_str']").html(item.price_str);
					element.find("[name='item_stock']").val(item.stock);
					
					element.find("[name='item_image'], [name='item_name'], [name='item_description_long'], [name='item_price_str']").on("click", function(){
						scrollTo("#order_detail");
						// scrollBottom();
						load_item_detail(item.id);
					});
					
					element.find("[name=button-minus-quantity]").on("click", function(){
						var cur_quantity = parseInt(element.find("[name='item_quantity']").val());
						if (cur_quantity > 0) element.find("[name='item_quantity']").val(cur_quantity - 1);
					});
					
					element.find("[name=button-add-quantity]").on("click", function(){
						var cur_quantity = parseInt(element.find("[name='item_quantity']").val());
						var max_quantity = parseInt(item.stock);
						if (cur_quantity < max_quantity) element.find("[name='item_quantity']").val(cur_quantity + 1);
					});
				});
			} else {
				
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
				
				element.find("[name='item_image']").attr("src", result.item.image);
				element.find("[name='item_name']").html(result.item.name);
				element.find("[name='item_price_str']").html(result.item.price_str);
				element.find("[name='item_description_long']").html(result.item.description_long);
	
				element.find("[name='btn_back']").on("click", function(){
					scrollTop();
				});
			} else {
				
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
		scrollTo("#order_detail");
		$.ajax({
			type: "POST",
			url: base_url + "/Customer/load_checkout_summary/",
			data:
			{
				items: order_items
			},
			success: function(result) {
				if (result.err == 0) {
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
	
					element.find("[name='btn_back']").on("click", function(){
						scrollTop();
					});
				} else {
					
				}
			}
		});
	} else {
		alert("Silakan pilih barang yang mau dipesan terlebih dahulu");
	}
	
}