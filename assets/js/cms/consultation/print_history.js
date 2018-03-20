$(function () {
    $("#example1").DataTable({
      "language": {
        "search": "Cari data:",
        "lengthMenu": "Lihat _MENU_ data",
        "zeroRecords": "Data tidak tersedia",
        "infoFiltered":   "",
        // "infoEmpty": "Data user belum tersedia",
        // "info": "Halaman _PAGE_ dari _PAGES_ tersedia _MAX_ data",
        "paginate": {
            "first":      "Pertama",
            "last":       "Terakhir",
            "next":       "Selanjutnya",
            "previous":   "Kembali"
        },
        // "emptyTable":     "No data available in table",
        "info":           "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        "infoEmpty":      "Data 0 - 0 dari 0 data",
        // "infoFiltered":   "(filtered from _MAX_ total entries)",
        // Showing _START_ to _END_ of _TOTAL_ entries
        // "infoFiltered": "(filtered from _MAX_ total records)"
    },
    });
});