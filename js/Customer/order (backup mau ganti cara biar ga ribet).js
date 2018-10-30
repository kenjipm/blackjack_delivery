$(document).ready(function(){
	load_item_list();
	bind_btn_hitung();
});

function bind_btn_hitung() {
	$("#btn_hitung").on("click", function(){
		scrollTo("#order_detail");
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
				$("#item_list").html("");
				result.items.forEach(function(item, i){
					var template = $("[name='item_template']").html();
					$(template).attr("item_id", item.id).appendTo("#item_list");
					var element = $("#item_list [name='item'][item_id=" + item.id + "]");
					
					element.find("[name]").each(function(idx){
						var cur_name = $(this).attr("name");
						$(this).attr("name", cur_name + "[" + i + "]");
					});
					
					element.find("[name='item_id" + "[" + i + "]']").val(item.id);
					element.find("[name='item_price" + "[" + i + "]']").val(item.price);
					element.find("[name='item_image" + "[" + i + "]']").attr("src", item.image);
					element.find("[name='item_name" + "[" + i + "]']").html(item.name);
					element.find("[name='item_description_long" + "[" + i + "]']").html(item.description_long);
					element.find("[name='item_price_str" + "[" + i + "]']").html(item.price_str);
					element.find("[name='item_stock" + "[" + i + "]']").val(item.stock);
					
					element.find("[name='item_image" + "[" + i + "]'], [name='item_name" + "[" + i + "]'], [name='item_description_long" + "[" + i + "]'], [name='item_price_str" + "[" + i + "]']").on("click", function(){
						scrollTo("#order_detail");
						load_item_detail(item.id);
					});
					
					element.find("[name='button-minus-quantity" + "[" + i + "]']").on("click", function(){
						var cur_quantity = parseInt(element.find("[name='item_quantity" + "[" + i + "]']").val());
						if (cur_quantity > 0) element.find("[name='item_quantity" + "[" + i + "]']").val(cur_quantity - 1);
					});
					
					element.find("[name='button-add-quantity" + "[" + i + "]']").on("click", function(){
						var cur_quantity = parseInt(element.find("[name='item_quantity" + "[" + i + "]']").val());
						var max_quantity = parseInt(item.stock);
						if (cur_quantity < max_quantity) element.find("[name='item_quantity" + "[" + i + "]']").val(cur_quantity + 1);
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
				
			} else {
				
			}
		}
	});
}

function load_checkout() {
	$("#order_detail").html("");
	
	$.ajax({
		type: "POST",
		url: base_url + "/Customer/test/",
		data: $("#item_list_form").serialize(),
		success: function(result) {
			if (result.err == 0) {
				
			} else {
				
			}
		}
	});
	
	var template = $("[name='checkout_template']").html();
	$(template).appendTo("#order_detail");
	var element = $("#order_detail");
	
	var total_order = 0;
	$("[name=item]").each(function(i){
		var item_quantity = parseInt($(this).find("[name=item_quantity]").val());
		if (item_quantity > 0) {
			var item_id = $(this).find("[name=item_id]").val();
			$.ajax({
				type: "POST",
				url: base_url + "/Customer/load_checkout_item_detail/",
				data:
				{
					id: item_id,
					quantity: item_quantity
				},
				success: function(result) {
					if (result.err == 0) {
						var checkout_item_template = $("[name='checkout_item_template']").html();
						$(checkout_item_template).attr("item_id", result.item.id).appendTo("#order_detail [name=item_list]");
						var element = $("#order_detail [name=item_list] [name='item'][item_id=" + result.item.id + "]");

						element.find("[name='item_id']").val(result.item.id);
						element.find("[name='item_price']").val(result.item.price);
						element.find("[name='item_total']").val(result.item.total);
						
						total_order += parseInt(result.item.total);
						
						element.find("[name='item_name']").html(result.item.name);
						element.find("[name='item_quantity']").html(result.item.quantity);
						element.find("[name='item_price_str']").html(result.item.price_str);
						element.find("[name='item_total_str']").html(result.item.total_str);
					} else {
						
					}
				}
			});
		}
	});
	
	if (total_order > 0) { // kalau ada ordernya, baru proses
		$.ajax({
			type: "POST",
			url: base_url + "/Customer/load_checkout_summary/",
			data:
			{
				value: total_order
			},
			success: function(result) {
				if (result.err == 0) {
					element.find("[name='subtotal']").val(result.summary.subtotal);
					element.find("[name='subtotal_str']").html(result.summary.subtotal_str);
					element.find("[name='free_ongkir']").val(result.summary.free_ongkir);
					element.find("[name='free_ongkir_str']").html(result.summary.free_ongkir_str);
				} else {
					
				}
			}
		});
	} else {
		$("#order_detail").html("Silakan pilih barang yang mau dipesan terlebih dahulu");
	}
	
}