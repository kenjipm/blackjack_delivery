var base_url = "/blackjack_delivery";

$(document).ready(function(){
	
});

$(document).bind("ajaxSend", function(){
	$("#loading").show();
}).bind("ajaxComplete", function(){
	$("#loading").hide();
});

var popup = {
	open: function(popup_id) {
		var cur_opacity = parseFloat($("#overlay").css("opacity"));
		$("#"+popup_id).fadeIn(250);
		if (cur_opacity < 0.5) $("#overlay").fadeIn(250);
		$("#overlay").css("opacity", cur_opacity + 0.25);
	},
	close: function(popup_id) {
		var cur_opacity = parseFloat($("#overlay").css("opacity"));
		$("#"+popup_id).fadeOut(250);
		if (cur_opacity < 0.5) $("#overlay").fadeOut(250);
		$("#overlay").css("opacity", cur_opacity - 0.25);
	}
}

function peek_password(peeked_id) {
	var cur_type = $("#" + peeked_id).attr("type");
	if (cur_type == "password") {
		 $("#" + peeked_id).attr("type", "text");
	} else {
		 $("#" + peeked_id).attr("type", "password");
	}
}

function scrollTop() {
	$('html, body').animate({
		scrollTop: 0
	}, 100);
}

function scrollBottom() {
	$('html, body').animate({
		scrollTop: $("html, body").height()
	}, 100);
}

function scrollTo(elementSelector) {
	$('html, body').animate({
		scrollTop: $(elementSelector).offset().top - $("html, body").offset().top + $("html, body").scrollTop()
	}, 100);
}