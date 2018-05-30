$(function () {
  var select2 = $("#check-search").select2({
    placeholder: ''
  });
  select2.data('select2').$selection.css('height', '35px');
});

function checkChange() {
  $('#form-check').submit();
}