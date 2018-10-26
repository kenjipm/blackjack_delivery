$(document).ready(function(){
	load_item_list();
});

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
				
				element.find("[name='item_image']").val(result.item.image);
				element.find("[name='item_name']").html(result.item.name);
				element.find("[name='item_price_str']").html(result.item.price_str);
				element.find("[name='item_description_long']").html(result.item.description_long);
				
			} else {
				
			}
		}
	});
}