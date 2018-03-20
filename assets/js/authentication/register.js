// config datepicker borndate
    $('#born_date').datetimepicker({
        locale: moment.locale('id', {
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            monthsShort : ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']
        }),
        format: 'DD/MM/YYYY',
        maxDate: moment().add(-20, 'years').endOf('years'), // set last month of -20 years from now
        minDate: moment().add(-28, 'years').endOf('years'), // set last month of -2 years from now
        defaultDate: ''
    });
    $('#born_date').val('') // remove initial value

    $('#born_date').on('dp.change dp.show', function() {
        $('#register').formValidation('revalidateField', 'born_date');
    });

    // config form validation
    $('#register').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
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
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Memastikan kata sandi tidak boleh kosong'
                    },
                    identical: {
                        field: 'password',
                        message: 'Kata sandi tidak sesuai'
                    }
                }
            }
        }
    });