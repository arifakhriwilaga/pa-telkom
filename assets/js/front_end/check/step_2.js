$(function () {
	$('input[type=radio][name=answer]').change(function() {
	    $('#form-check-2').submit();
	});
});