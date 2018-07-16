$('#login').formValidation({
    // framework: 'bootstrap',
    // icon: {
    //     valid: 'glyphicon glyphicon-ok',
    //     invalid: 'glyphicon glyphicon-remove',
    //     validating: 'glyphicon glyphicon-refresh'
    // },
    fields: {
        username: {
            validators: {
                notEmpty: {
                    message: 'Nama Pengguna tidak boleh kosong'
                }
            }
        },
        password: {
            validators: {
                notEmpty: {
                    message: ' '
                }
            }
        }
    }
});