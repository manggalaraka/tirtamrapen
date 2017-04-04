var FormsMultipleUpload = {

	create: function () {
		// Initialize the jQuery File Upload widget:
		$('#fileupload').fileupload({
			// Uncomment the following to send cross-domain cookies:
			//xhrFields: {withCredentials: true},
			//url: 'server/php/',
			url: 'profile_tm/act_profile_photoheader_upload/',
			disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
			maxFileSize: 200000, // maximal upload 2mb
			acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
		});

		// Enable iframe cross-domain access via redirect option:
		$('#fileupload').fileupload(
			'option',
			'redirect',
			window.location.href.replace(
					/\/[^\/]*$/,
					'/cors/result.html?%s'
			)
		);

		// Upload server status check for browsers with CORS support:
		if ($.support.cors) {
			$.ajax({
				//url: '//jquery-file-upload.appspot.com/',
				url: 'profile_tm/act_profile_photoheader_upload/',
				type: 'HEAD'
			}).fail(function () {
				$('<div class="alert alert-danger"/>')
				.text('Upload server currently unavailable - ' +new Date())
				.appendTo('#fileupload');
			});
		}

		// Load existing files:
		$('#fileupload').addClass('fileupload-processing');
		$.ajax({
			// Uncomment the following to send cross-domain cookies:
			//xhrFields: {withCredentials: true},
			url: $('#fileupload').fileupload('option', 'url'),
			dataType: 'json',
			context: $('#fileupload')[0]
		}).always(function () {
				$(this).removeClass('fileupload-processing');
		}).done(function (result) {
				$(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
		});
	},

	init: function () {
		this.create();
	}
}




