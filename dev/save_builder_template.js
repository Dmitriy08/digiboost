function _fwBuilderDumpJSONOnClick(stop) {
	var $ = jQuery,
		ns = '.dumpOnClick',
		$builder = $('.fw-option-type-builder'),
		$highlighted = $('<div></div>'),
		highlight = function ($element) {
			$highlighted.css({'outline': ''});
			$highlighted = $element;
			$highlighted.css({'outline': '3px dashed #FF5500'});
		};

	$builder.off(ns);

	if (stop) {
		return;
	}

	$builder
		.on('mousemove' + ns, function (e) {
			var $item = $(e.target).closest('.builder-item');

			if ($item.length) {
				highlight($item);
			} else {
				highlight($builder.find('> .builder-root-items:first'));
			}
		})
		.on('mousedown' + ns, function (e) {
			var $item = $(e.target).closest('.builder-item');

			$builder.trigger(
				'fw:option-type:builder:dump-json',
				$item.length ? {cid: $item.attr('id').split('-').pop()} : {}
			)
		});
}

_fwBuilderDumpJSONOnClick();