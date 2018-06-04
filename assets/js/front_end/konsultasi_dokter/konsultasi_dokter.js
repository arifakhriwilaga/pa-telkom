$('.list-doctor').click(function () {
    $('.list-doctor').removeClass('selected');
    $(this).addClass('selected');
    var id = $('[name="doctor_ids"]', this).val();
    $('[name="id_dokter"]').val(id);
    $('#form-consul-doctor .btn-consul').attr('disabled', false).removeClass('disabled');
    $('#form-consul-doctor').formValidation('revalidateField', 'id_dokter');
});

$('#form-consul-doctor').formValidation({
    framework: 'bootstrap',
    fields: {
        pertanyaan_konsul: {
            validators: {
                notEmpty: {
                    message: 'Pertanyaan tidak boleh kosong!'
                }
            }
        },
        id_dokter: {
            excluded: false, // Don't ignore me, please!
            validators: {
                notEmpty: {
                    message: 'Dokter belum dipilih!'
                }
            }
        }
    }
});