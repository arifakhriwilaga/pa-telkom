$('#table-notifications').DataTable({
    "language": {
        "search": "Cari data:",
        "lengthMenu": "Lihat _MENU_ data",
        "zeroRecords": "Data tidak tersedia",
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
        "infoFiltered":   "",
        // Showing _START_ to _END_ of _TOTAL_ entries
        // "infoFiltered": "(filtered from _MAX_ total records)"
    },
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": site_url('cms/notification_management/get_notifications'),
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [0],
            "orderable": false,
        },
        // {
        //     "targets": [6],
        //     "orderable": false,
        // },
    ]
});