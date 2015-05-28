$.fn.smartFloat = function (opts) {
	var position = function (element) {
		var top = $(element).offset().top, pos = element.css("position");
		$(window).scroll(function () {
			var scrolls = $(this).scrollTop();
			if (opts.reverse) {
				$(element).data('data-max-height', top);
				var max = $(element).data('data-max-height');
				if (scrolls + $(window).height() > max) {
					element.css({position: pos});
				} else {
					element.css($.extend({}, {position: "fixed"}, opts));
				}
			} else {
				if (scrolls > top) {
					element.css($.extend({}, {position: "fixed"}, opts));
				} else {
					element.css({position: pos});
				}
			}
		});
	};
	return $(this).each(function () {
		position($(this));
	});
};