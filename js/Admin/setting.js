$(document).ready(function(){
	bind_search_input();
	bind_btn_search();
	bind_btn_tambah_item();
	bind_btn_atur_ongkir();
	load_item_list();
});

function bind_search_input() {
	$("#search_input").on("keydown", function(e){
		if(e.keyCode == 13) {
			$("#btn_search").click();
		}
	});
}

function bind_btn_tambah_item() {
	$("#btn_tambah_item").on("click", function(){
		prepare_second_frame();
		load_tambah_item();
	});
}

function bind_btn_atur_ongkir() {
	$("#btn_atur_ongkir").on("click", function(){
		prepare_second_frame();
		load_atur_ongkir();
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
	scrollTo("#second_frame");
}

function back_to_first_frame() {
	scrollTop();
	$("#second_frame").hide();
}

function load_item_list(search_terms="") {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/load_item_list/",
		data:
		{
			search_terms: search_terms
		},
		success: function(result) {
			if (result.err == 0) {
				scrollTop();
				result.items.forEach(function(item){
					var template = $("[name='setting_item_template']").html();
					$(template).attr("item_id", item.id).appendTo("#item_list");
					var element = $("#item_list [name='item'][item_id=" + item.id + "]");
					
					element.find("[name='item_id']").val(item.id);
					element.find("[name='item_price']").val(item.price);
					element.find("[name='item_name']").html(item.name);
					element.find("[name='item_stock']").val(item.stock);
					
					element.find("[name='btn_edit']").on("click", function(){
						prepare_second_frame();
						load_item_detail(item.id);
					});
					
					// bind save button function
					element.find("[name='btn_save']").prop("disabled", true);
					element.find("[name='btn_save']").on("click", function(){
						save_item_do(item.id);
					});
					
					// enabling save button if item changed
					element.find("[name='item_price']").on("keypress", function() {
						element.find("[name='btn_save']").prop("disabled", false);
					});
					element.find("[name='button-minus-stock'], [name='button-add-stock']").on("click", function() {
						element.find("[name='btn_save']").prop("disabled", false);
					});
					
					element.find("[name=button-minus-stock]").on("click", function(){
						var cur_quantity = parseInt(element.find("[name='item_stock']").val());
						element.find("[name='item_stock']").val(cur_quantity - 1);
					});
					
					element.find("[name=button-add-stock]").on("click", function(){
						var cur_quantity = parseInt(element.find("[name='item_stock']").val());
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
				
				element.find("[name='item_id']").val(result.item.id);
				element.find("[name='item_image']").attr("src", result.item.image_path);
				element.find("[name='item_name']").val(result.item.name);
				element.find("[name='item_sub_name_1']").val(result.item.sub_name_1);
				element.find("[name='item_sub_name_2']").val(result.item.sub_name_2);
				element.find("[name='item_price']").val(result.item.price);
				element.find("[name='item_stock']").val(result.item.stock);
				element.find("[name='item_description_long']").val(result.item.description_long);
	
				element.find("[name='item_image_file']").on("change", function(){
					if (this.files && this.files[0]) {
						var reader = new FileReader();

						reader.onload = function (e) {
							element.find("[name='item_image']").attr('src', e.target.result);
						}

						reader.readAsDataURL(this.files[0]);
					}
				});
	
				element.find("[name='btn_save']").on("click", function(){
					update_item_do();
				});
	
				element.find("[name='btn_back']").on("click", function(){
					back_to_first_frame();
				});
	
				element.find("[name='btn_delete']").on("click", function(){
					delete_item_do(item_id);
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
	
	element.find("[name='item_image_file']").on("change", function(){
		if (this.files && this.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				element.find("[name='item_image']").attr('src', e.target.result);
			}

			reader.readAsDataURL(this.files[0]);
		}
	});
	
	element.find("[name='btn_save']").on("click", function(){
		tambah_item_do();
	});
	
	element.find("[name='btn_back']").on("click", function(){
		back_to_first_frame();
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
				});
				
				element.find("[name='btn_back']").on("click", function(){
					back_to_first_frame();
				});
			} else if (result.err == 1) {
				alert('Server error');
			}
		}
	});
}

function save_item_do(item_id) {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/save_item_do/",
		data: $("#item_list [name='item'][item_id=" + item_id + "] form").serialize(),
		success: function(result) {
			if (result.err == 0) {
				$("#item_list [name='item'][item_id=" + item_id + "] [name='btn_save']").prop("disabled", true);
			} else if (result.err == 1) {
				alert("Gagal mengubah data, silakan coba lagi");
			}
		}
	});
}

function update_item_do() {
	var form_data = new FormData($("#form_setting_item_detail")[0]);
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/update_item_do/",
		data: form_data,
		success: function(result) {
			if (result.err == 0) {
				$("#form_setting_item_detail [name='success_message']").html("Item berhasil di update");
				$("#form_setting_item_detail [name='failure_message']").html("");
			} else if (result.err == 1) {
				$("#form_setting_item_detail [name='success_message']").html("");
				$("#form_setting_item_detail [name='failure_message']").html("Item gagal di update");
			}
			else if (result.err == 2) {
				$("#form_setting_item_detail [name='success_message']").html("");
				$("#form_setting_item_detail [name='failure_message']").html("Foto gagal di update");
			}
		},
        cache: false,
        contentType: false,
        processData: false
	});
}

function tambah_item_do() {
	var form_data = new FormData($("#form_tambah_item_detail")[0]);
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/create_item_do/",
		data: form_data,
		success: function(result) {
			if (result.err == 0) {
				clear_item_list();
				load_item_list();
				$("#form_tambah_item_detail [name='success_message']").html("Item berhasil ditambahkan");
				$("#form_tambah_item_detail [name='failure_message']").html("");
			} else if (result.err == 1) {
				$("#form_tambah_item_detail [name='success_message']").html("");
				$("#form_tambah_item_detail [name='failure_message']").html("Item gagal ditambahkan");
			}
			else if (result.err == 2) {
				$("#form_tambah_item_detail [name='success_message']").html("");
				$("#form_tambah_item_detail [name='failure_message']").html("Foto gagal ditambahkan");
			}
		},
        cache: false,
        contentType: false,
        processData: false
	});
}

function delete_item_do(item_id) {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/delete_item_do/",
		data:
		{
			item_id: item_id
		},
		success: function(result) {
			if (result.err == 0) {
				$("#form_tambah_item_detail [name='success_message']").html("Item berhasil dihapus");
				$("#form_tambah_item_detail [name='failure_message']").html("");
			} else if (result.err == 1) {
				$("#form_tambah_item_detail [name='success_message']").html("");
				$("#form_tambah_item_detail [name='failure_message']").html("Item gagal dihapus");
			}
		},
        cache: false,
        contentType: false,
        processData: false
	});
}

function atur_ongkir_do() {
	$.ajax({
		type: "POST",
		url: base_url + "/Admin/create_ongkir_setting_do/",
		data: $("#form_atur_ongkir_detail").serialize(),
		success: function(result) {
			if (result.err == 0) {
				$("#form_atur_ongkir_detail [name='success_message']").html("Ongkir berhasil di update");
				$("#form_atur_ongkir_detail [name='failure_message']").html("");
			} else if (result.err == 1) {
				$("#form_atur_ongkir_detail [name='success_message']").html("");
				$("#form_atur_ongkir_detail [name='failure_message']").html("Ongkir gagal di update");
			}
		}
	});
}