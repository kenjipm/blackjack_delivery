$(document).ready(function(){
	load_item_list();
});

function load_item_list() {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/load_item_list/",
		data:
		{
			
		},
		success: function(result) {
			if (result.err == 0) {
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
			} else {
				
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
				
			} else {
				
			}
		}
	});
}