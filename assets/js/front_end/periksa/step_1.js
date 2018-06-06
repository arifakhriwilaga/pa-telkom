$(function () {
  var select2 = $("#pencarian-gejala").select2({
    placeholder: ''
  });
  select2.data('select2').$selection.css('height', '35px');
});

function checkChange() {
  $('#form-periksa').submit();
}