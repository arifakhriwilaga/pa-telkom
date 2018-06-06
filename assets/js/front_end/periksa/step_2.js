$(function () {
	$('input[type=radio][name=jawaban]').change(function() {
	    $('#form-periksa-2').submit();
	});
});