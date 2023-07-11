(function(){
	jQuery(".acf-slider-prev").on("click", function(){
		var current = jQuery(this).closest(".acf-slider-nav").data("current");
		if(!current){
			current = 0;
		}
		current--;
		var slides = jQuery(this).closest(".acf-slider-nav").siblings(".acf-slider").children();
		var first = slides.first();
		if(current < 0){
			current = slides.length - 1;
		}
		jQuery(this).closest(".acf-slider-nav").data({
			current: current
		});
		first.css({
			marginLeft: -current * 100 + '%'
		});
		current++;
		var pages = jQuery(this).closest(".acf-slider-nav").siblings(".acf-slider-pages");
		pages.find("i").css({
			height: current / slides.length * 100 + "%"
		});
		current += "";
		current = current.padStart(2, "0");
		pages.children(".acf-slider-current").text(current);
	});
	jQuery(".acf-slider-next").on("click", function(){
		var current = jQuery(this).closest(".acf-slider-nav").data("current");
		if(!current){
			current = 0;
		}
		current++;
		var slides = jQuery(this).closest(".acf-slider-nav").siblings(".acf-slider").children();
		var first = slides.first();
		if(current >= slides.length){
			current = 0;
		}
		jQuery(this).closest(".acf-slider-nav").data({
			current: current
		});
		first.css({
			marginLeft: -current * 100 + '%'
		});
		current++;
		var pages = jQuery(this).closest(".acf-slider-nav").siblings(".acf-slider-pages");
		pages.find("i").css({
			height: current / slides.length * 100 + "%"
		});
		current += "";
		current = current.padStart(2, "0");
		pages.children(".acf-slider-current").text(current);
	});
})(jQuery);
