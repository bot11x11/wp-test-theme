(function(){
function calculate(calculator){
	jQuery(calculator).addClass("calculating").removeClass("error");
	var n1 = jQuery(calculator).find("input[name='n1']").val();
	var n2 = jQuery(calculator).find("input[name='n2']").val();
	var operator = jQuery(calculator).find("select[name='operator']").val();
	jQuery.getJSON(calculator_params.ajax_url, {
		action: "calculate",
		n1: n1,
		n2: n2,
		operator: operator
	}, function(result){
		jQuery(calculator).removeClass("calculating");
		if(result.error){
			jQuery(calculator).addClass("error");
		}
		jQuery(calculator).find(".calculator-result strong").text(result.result);
	})
}
	var t;
	jQuery(".calculator input, .calculator select").on("change input", function(){
		clearTimeout(t);
		var calculator = jQuery(this).closest(".calculator");
		t = setTimeout(function(){
			calculate(calculator);
		}, 1000);
	});
	jQuery(".calculator").each(function(){
		calculate(this);
	});
})(jQuery);
