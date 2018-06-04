$('#lupa-kata-sandi').formValidation({
    framework: 'bootstrap',
    fields: {
        username: {
            validators: {
                notEmpty: {
                    message: 'Nama pengguna tidak boleh kosong'
                }
            }
        },
        password: {
            validators: {
                notEmpty: {
                    message: 'Kata sandi baru tidak boleh kosong'
                },
                stringLength: {
                    min: 6,
                    max: 15,
                    message: 'Kata sandi baru terlalu pendek'
                }
            }
        },
        konfirmasi_password: {
            validators: {
                notEmpty: {
                    message: 'Ulang kata sandi tidak boleh kosong'
                },
                identical: {
                    field: 'password',
                    message: 'Kata sandi tidak sesuai'
                }
            }
        }
    }
});