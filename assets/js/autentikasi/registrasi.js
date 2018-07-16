$(function() {
    // config datepicker borndate
    $('#tgl_lahir').datetimepicker({
        locale: moment.locale('id', {
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            monthsShort : ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']
        }),
        format: 'DD/MM/YYYY',
        maxDate: moment().add(-20, 'years').endOf('years'), // set last month of -20 years from now
        minDate: moment().add(-28, 'years').endOf('years'), // set last month of -2 years from now
        defaultDate: ''
    });
    $('#tgl_lahir').val('') // remove initial value

    $('#tgl_lahir').on('dp.change dp.show', function() {
        $('#registrasi').formValidation('revalidateField', 'tgl_lahir');
    });

    // default form validation
    $('#registrasi').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled'],
        resetForm: true,
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_user: {
                validators: {
                    notEmpty: {
                        message: 'Nama Lengkap tidak boleh kosong'
                    },
                    stringLength: {
                        min: 3,
                        message: 'Nama pengguna harus lebih dari 2 karakter'
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
                        message: 'Nama pengguna tidak boleh kosong'
                    },
                    stringLength: {
                        max: 30,
                        message: 'Nama pengguna harus dibawah 30 karakter'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'Nama pengguna tidak boleh menggunakan symbol'
                    }
                }
            },
            jk_user: {
                validators: {
                    notEmpty: {
                        message: 'Pilih jenis kelamin'
                    }
                }
            },
            tgl_lahir: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal lahir tidak boleh kosong'
                    },
                    regexp: {
                        regexp: /^[0-9]{2}\/+[0-9]{2}\/+[0-9]{4}$/,
                        message: 'Masukan dengan format DD/MM/YYYY'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Kata sandi tidak boleh kosong'
                    },
                    stringLength: {
                        min: 6,
                        max: 15,
                        message: 'Kata sandi terlalu pendek'
                    }
                }
            },
            konfirmasi_password: {
                validators: {
                    notEmpty: {
                        message: 'Memastikan kata sandi tidak boleh kosong'
                    },
                    identical: {
                        field: 'password',
                        message: 'Kata sandi tidak sesuai'
                    }
                }
            },
            nip: {
                validators: {
                    notEmpty: {
                        message: 'Nip tidak boleh kosong'
                    }
                }
            },
            berkas: {
                validators: {
                    notEmpty: {
                        message: 'Berkas tidak boleh kosong'
                    }
                }
            }
        }
    });

    $('input[name="type"]').on('change', function () {
        if ($(this).val() === 'd') {
            $('#form-dokter').removeClass('hide');
            $('#berkas').attr('disabled', false);
            $('#nip').attr('disabled', false);
        } else {
            $('#form-dokter').addClass('hide');
            $('#berkas').attr('disabled', true);
            $('#nip').attr('disabled', true);
        }
        $('#registrasi').formValidation('resetForm', true);
    });

});