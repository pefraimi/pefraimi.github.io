jQuery(document).ready(function() {
	var Cite = require('citation-js');
	jQuery('citation').each(function() {
		var cite = new Cite(jQuery(this).text());
		var options = {
			format: 'string',
			type: 'html',
			style: 'citation-apa',
			lang: 'en-US',
			append: ''
		};
		if (jQuery(this).attr('after')) {
			options.append += '<span style="margin-left:6px;">[' + jQuery(this).attr('after') + ']</span>';
		}
		if (jQuery(this).attr('href')) {
			options.append += '<a style="margin-left:6px;" href="' + jQuery(this).attr('href') + '"><i class="fa fa-arrow-circle-right"></i></a>';
		}
		jQuery(this).html(cite.get(options));
	});
});
