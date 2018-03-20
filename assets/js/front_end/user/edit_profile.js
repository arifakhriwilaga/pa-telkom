var user_id = "<?php echo json_encode($user['user_id']); ?>"
// config datepicker borndate
$('#born_date').datetimepicker({
    locale: moment.locale('id', {
        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
    }),
    format: 'DD/MM/YYYY',
    maxDate: moment().add(-20, 'years').endOf('years'), // set last month of -20 years from now
    minDate: moment().add(-28, 'years').endOf('years'), // set last month of -2 years from now
    defaultDate: ''
});

$('#born_date').val($('#born_date').data('born_date')); // remove initial value

$('#born_date').on('dp.change dp.show', function () {
    $('#update-profile').formValidation('revalidateField', 'born_date');
});

// config form validation
$('#edit-profile').formValidation({
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
                    regexp: /^[0-9]{2}\/+[0-9]{2}\/+[0-9]{4}$/,
                    message: 'Masukan dengan format DD/MM/YYYY'
                }
            }
        },
        password: {
            validators: {
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
                }
            }
        }
    }
});
$("#edit-profile #input-profile-picture").on('change', function () {
    var input = this;
    $("#edit-profile").ajaxSubmit({
        type: "post",
        url: site_url('front_end/profile/upload_picture/'+user_id),
        dataType: 'json',
        success: function (status, message, data) {
            if (status) {
                $('#profile-image').attr('src', base_url(data.responseJSON.data));
            }
        }
    });
});