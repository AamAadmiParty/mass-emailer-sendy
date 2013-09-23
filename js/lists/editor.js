$(document).ready(
	function()
	{
		$('#thankyou_message, #goodbye_message, #confirmation_email').redactor({
			autoresize: true,
			imageUpload: 'includes/create/upload.php',
			convertDivs: false,
			convertLinks: false,
			overlay: false,
			minHeight: 200,
			cleanup: false,
			iframe: true,
			fullpage: true,
			plugins: ['fontcolor'],
			buttons: ['html', '|', 'bold', 'italic', 'deleted', 'formatting', '|', 'link', 'image', 'file', 'table', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', 'alignment', '|', 'horizontalrule']
		});
	}
);