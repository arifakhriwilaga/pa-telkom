var id_user = "<?php echo json_encode($user['id_user']); ?>"
// config datepicker borndate
$('#tgl_lahir').datetimepicker({
    locale: moment.locale('id', {
        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
    }),
    format: 'DD/MM/YYYY',
    maxDate: moment().add(-20, 'years').endOf('years'), // set last month of -20 years from now
    minDate: moment().add(-28, 'years').endOf('years'), // set last month of -2 years from now
    defaultDate: ''
});

$('#tgl_lahir').val($('#tgl_lahir').data('tgl_lahir')); // remove initial value

$('#tgl_lahir').on('dp.change dp.show', function () {
    $('#update-profile').formValidation('revalidateField', 'tgl_lahir');
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
        nama_user: {
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
                stringLength: {
                    min: 6,
                    max: 15,
                    message: 'Password terlalu pendek'
                }
            }
        },
        konfirmasi_password: {
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
        url: site_url('front_end/profile/upload_picture/'+id_user),
        dataType: 'json',
        success: function (status, message, data) {
            if (status) {
                $('#profile-image').attr('src', base_url(data.responseJSON.data));
            }
        }
    });
});