$(function () {
    var table = $("#kunjungan").DataTable({
        "language": {
            "search": "Cari data:",
            "lengthMenu": "Lihat _MENU_ data",
            "zeroRecords": "Data tidak tersedia",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Kembali"
            },
            "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            "infoEmpty": "Data 0 - 0 dari 0 data",
            "infoFiltered": "",
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": site_url('front_end/c_kunjungan/ambil_kunjungan'),
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [0],
                "orderable": false,
            },
            {
                "targets": [1],
                "orderable": false,
            }
        ]
    });
    $('.calendar').pignoseCalendar({
        initialize:false,
        week: 1,
        format: 'YYYY-MM-DD',
        weeks: [
            'Min',
            'Sen',
            'Sel',
            'Rab',
            'Kam',
            'Jum',
            'Sab'
        ],
        monthsLong: [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ],
        months: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ],
        controls: {
            ok: 'OK',
            cancel: 'Cancel'
        },
        select: function(date) {
            if (date[0] === null) {
                table.search('').draw();
            } else {
                table.search(date[0]._i).draw();
            }
        }
    });
});