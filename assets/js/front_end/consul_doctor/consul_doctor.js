APP.handleDatePicker('.input-group.date');
    $('.input-group.date').on('dp.change dp.show', function() {
        $('#register').formValidation('revalidateField', 'born_date');
    });
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
            email: {
                validators: {
                    emailAddress: {
                        message: 'Email tidak valid'
                    },
                    notEmpty: {
                        message: 'Email tidak boleh kosong'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username tidak boleh kosong'
                    },
                    stringLength: {
                        max: 30,
                        message: 'The username must be less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'Username tidak boleh menggunakan symbol'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'Pilih jenis kelamin'
                    }
                }
            },
            born_date: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal lahir tidak boleh kosong'
                    },
                    regexp: {
                        regexp: /^[0-9]{4}\-+[0-9]{2}\-[0-9]{2}$/,
                        message: 'Masukan dengan format YYYY-MM-DD'
                    }
                }
            },
            password: {
                validators: {
                    identical: {
                        field: 'confirm_password',
                        message: 'Password tidak sesuai'
                    },
                    stringLength: {
                        min: 6,
                        max: 15,
                        message: 'Password terlalu pendek'
                    }
                }
            },
            confirm_password: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'Password tidak sesuai'
                    },
                    stringLength: {
                        min: 6,
                        max: 15,
                        message: 'Konfirmasi password terlalu pendek'
                    }
                }
            }
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