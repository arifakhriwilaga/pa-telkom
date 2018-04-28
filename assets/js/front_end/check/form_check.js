var data = [
  {
      id: 0,
      text: 'enhancement'
  },
  {
      id: 1,
      text: 'bug'
  },
  {
      id: 2,
      text: 'duplicate'
  },
  {
      id: 3,
      text: 'invalid'
  },
  {
      id: 4,
      text: 'wontfix'
  }
];

// $("#check-search").select2({
//   data: data,
//   placeholder: 'Silahkan pilih gejala yang Anda rasakan'
// })
var select2 = $("#check-search").select2({
  data: data,
  placeholder: 'Silahkan pilih gejala yang Anda rasakan',
  minimumResultsForSearch: -1
});
select2.data('select2').$selection.css('height', '35px');
