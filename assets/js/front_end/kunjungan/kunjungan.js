$("#example1").DataTable({
    "language": {
        "search": "Cari data:",
        "lengthMenu": "Filter _MENU_ data",
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
        // "infoFiltered":   "(filtered from _MAX_ total entries)",
        // Showing _START_ to _END_ of _TOTAL_ entries
        // "infoFiltered": "(filtered from _MAX_ total records)"
    },
    "searching": false,
});
$(function () {
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
        select: function(date, context) {
            /**
             * @params this Element
             * @params date moment[]
             * @params context PignoseCalendarContext
             * @returns void
             */
    
             // This is selected button Element.
             var $this = $(this);
    
             // You can get target element in `context` variable, This element is same `$(this)`.
             var $element = context.element;
    
             // You can also get calendar element, It is calendar view DOM.
             var $calendar = context.calendar;
    
             // Selected dates (start date, end date) is passed at first parameter, And this parameters are moment type.
             // If you unselected date, It will be `null`.
             console.log(date[0]._i);
        }
    });
});