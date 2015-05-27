/**
 * jQuery Unveil
 * A very lightweight jQuery plugin to lazy load images
 * http://luis-almeida.github.com/unveil
 *
 * Licensed under the MIT license.
 * Copyright 2013 Luís Almeida
 * https://github.com/luis-almeida
 */

;
(function ($) {

	$.fn.unveil = function (threshold) {

		var $w = $(window),
			th = threshold || 0,
			retina = window.devicePixelRatio > 1,
			attrib = retina ? "data-src-retina" : "data-src",
			images = this,
			loaded,
			inview,
			appear = null,
			source;

		this.one("unveil", function () {
			if ($(this).is(':visible')) setAttr(this);
		});

		this.one("appear", function () {
			setAttr(this);
		});

		function setAttr(img) {
			source = img.getAttribute(attrib);
			source = source || img.getAttribute("data-src");
			if (source) img.setAttribute("src", source);
		}

		function unveil() {
			inview = images.filter(function () {
				var $e = $(this),
					wt = $w.scrollTop(),
					wb = wt + $w.height(),
					et = $e.offset().top,
					eb = et + $e.height();

				return eb >= wt - th && et <= wb + th;
			});

			loaded = inview.trigger("unveil");
			images = images.not(loaded);
		}

		$w.scroll(unveil);
		$w.resize(unveil);

		unveil();

		return this;

	};

})(jQuery);


