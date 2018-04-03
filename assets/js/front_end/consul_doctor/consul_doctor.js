$('#register').formValidation({
    framework: 'bootstrap',
    fields: {
        name: {
            validators: {
                notEmpty: {
                    message: 'Nama Lengkap tidak boleh kosong'
                }
            }
        },
    }
}).on('success.form.fv', function(e) {
    e.preventDefault();
    var $form = $(e.target),
        fv    = $form.data('formValidation');
    $.ajax({
        url: site_url('authentication/simpan'),
        type: 'POST',
        data: $form.serialize()
    }).done(function(data) {
        if (data.status) {
            toastr.success(data.message);
            setTimeout(function(){ window.location = site_url('authentication'); }, 2000);
        } else {
            toastr.error(data.message);
        }
    }).fail(function (xhr, status, error) {
        var msg = '';
        if (xhr.status === 404) {
            msg = 'Requested page not found.';
        } else if (xhr.status === 500) {
            msg = 'Internal Server Error.';
        } else if (error === 'parsererror') {
            msg = 'Requested failed.';
        } else if (error === 'timeout') {
            msg = 'Time out error.';
        } else if (error === 'abort') {
            msg = 'Request aborted.';
        }
        toastr.error(msg);
    });
});