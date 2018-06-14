$(function () {
  var select2 = $("#pencarian-gejala").select2({
    placeholder: 'Ketik gejala yang dirasakan...',
    minimumInputLength: 1,
    ajax: {
      url: site_url('periksa/cari-gejala/:any'),
      delay: 250, 
      dataType: 'json',
      cache: true,
      data: function(params){
          return{
              q: params.term
          };
      },
      processResults: function (data) {
        var results = [];

        $.each(data, function(index, item){
            results.push({
                id: item.id_gejala,
                text: item.gejala
            });
        });
        return {
          results: results
        };
      }
    },
    language: {
      // You can find all of the options in the language files provided in the
      // build. They all must be functions that return the string that should be
      // displayed.
      inputTooShort: function () {
        return "Masukan minimal 1 karakter";
      },
      noResults: function () {
        return "Gejala tidak ditemukan";
      },
      searching: function () {
        return "Mencari gejala...";
      },
      errorLoading: function () {
        return "Terjadi kesahalahan";
      },
    }
    
  });
  select2.data('select2').$selection.css('height', '35px');
});

function checkChange() {
  $('#form-periksa').submit();
}