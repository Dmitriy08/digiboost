"use strict";

//read more here: http://manual.unyson.io/en/latest/options/customizer.html#customizer-options-live-preview
(function ($) {
	//value can be an empty (value.length = 0), color hex code (#ffffff) or json string
	function getColorOptionValue(val) {
		//if not empty string
		if (val) {
			//hex code
			if (val.length === 7) {
				return val;
				//json string
			} else {
				return JSON.parse(val)[0].value;
			}
		}
		return val;
	}

	function preloaderShow() {
		$('.preloader, .preloader_img, .preloader_css').fadeIn(800);
	}

	function preloaderHide() {
		//hiding preloader
		$(".preloader_img, .preloader_css").fadeOut(800);
		setTimeout(function () {
			$(".preloader").fadeOut(800);
		}, 200);
	}

	function processCompileButton(windowParent, wpCustomize) {
		var $parentBody = $(windowParent.document.body);
		var $button = $parentBody.find('#wp-scss-theme-recompile');

		if ($button.length) {
			return;
		}
		$parentBody.find('#sub-accordion-section-color_scheme_section').append('<li><a id="wp-scss-theme-recompile" class="button-primary">' + digiboost_customizer_text.button_text + '</a></li>');

		$button = $parentBody.find('#wp-scss-theme-recompile');
		$button.on('click', function (e) {
			compile(windowParent, wpCustomize);
		});
	}

	function compile(windowParent, wpCustomize) {
		preloaderShow();
		// var options = wp.customize.get();
		var options = wpCustomize.get();

		var data = {
			action: 'digiboost_compile_scss',
			accent_color_1: getColorOptionValue(options['fw_options[accent_color_1]']),
			accent_color_2: getColorOptionValue(options['fw_options[accent_color_2]']),
			accent_color_3: getColorOptionValue(options['fw_options[accent_color_3]']),
			accent_color_4: getColorOptionValue(options['fw_options[accent_color_4]']),
			font_color: getColorOptionValue(options['fw_options[font_color]']),
            light_color: getColorOptionValue(options['fw_options[light_color]']),
            dark_grey_color: getColorOptionValue(options['fw_options[dark_grey_color]']),
            dark_color: getColorOptionValue(options['fw_options[dark_color]']),
            grey_color: getColorOptionValue(options['fw_options[grey_color]']),
		}

		$.ajax({
			method: "POST",
			url: windowParent.ajaxurl,
			data: data
		}).done(function (msg) {
			//trigger reload for preview window
			//or remove/add css style
			var $cssLink = $('#digiboost-main-css');
			var link = $cssLink.attr('href');
			$cssLink.attr('href', '');
			$cssLink.attr('href', link);
			$cssLink.attr('href', link + new Date().getTime());

			//child theme
			var $cssLinkChild = $('#digiboost-child-main-css');
			var linkChild = $cssLinkChild.attr('href');
			$cssLinkChild.attr('href', '');
			$cssLinkChild.attr('href', linkChild);
			$cssLinkChild.attr('href', linkChild + new Date().getTime());

			preloaderHide();
		}).fail(function (msg) {
			var errorMessage = (typeof (msg.responseJSON) !== 'undefined') ? msg.responseJSON.data : digiboost_customizer_text.error_text;
			preloaderHide();
			//showing error message in preview in modal
			$('#messages_modal').find('.error').remove().end().find('.close').after('<div class="error">' + errorMessage + '</div>').end().modal('show');
		});
	}

	wp.customize('fw_options[accent_color_1]', function (value) {
		value.bind(function (newval) {
			compile(window.parent, wp.customize);
		});
	});

	wp.customize('fw_options[accent_color_2]', function (value) {
		value.bind(function (newval) {
			compile(window.parent, wp.customize);
		});
	});

	wp.customize('fw_options[accent_color_3]', function (value) {
		value.bind(function (newval) {
			compile(window.parent, wp.customize);
		});
	});

	wp.customize('fw_options[accent_color_4]', function (value) {
		value.bind(function (newval) {
			compile(window.parent, wp.customize);
		});
	});
    wp.customize('fw_options[font_color]', function (value) {
        value.bind(function (newval) {
            compile(window.parent, wp.customize);
        });
    });
    wp.customize('fw_options[light_color]', function (value) {
        value.bind(function (newval) {
            compile(window.parent, wp.customize);
        });
    });
    wp.customize('fw_options[dark_grey_color]', function (value) {
        value.bind(function (newval) {
            compile(window.parent, wp.customize);
        });
    });
    wp.customize('fw_options[dark_color]', function (value) {
        value.bind(function (newval) {
            compile(window.parent, wp.customize);
        });
    });
    wp.customize('fw_options[grey_color]', function (value) {
        value.bind(function (newval) {
            compile(window.parent, wp.customize);
        });
    });
})(jQuery);