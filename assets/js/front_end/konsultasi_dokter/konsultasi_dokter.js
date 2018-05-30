$('.list-doctor').click(function () {
    $('.list-doctor').removeClass('selected');
    $(this).addClass('selected');
    var id = $('[name="doctor_ids"]', this).val();
    $('[name="doctor_id"]').val(id);
    $('#form-consul-doctor .btn-consul').attr('disabled', false).removeClass('disabled');
    $('#form-consul-doctor').formValidation('revalidateField', 'doctor_id');
});

$('#form-consul-doctor').formValidation({
    framework: 'bootstrap',
    fields: {
        question: {
            validators: {
                notEmpty: {
                    message: 'Pertanyaan tidak boleh kosong!'
                }
            }
        },
        doctor_id: {
            excluded: false, // Don't ignore me, please!
            validators: {
                notEmpty: {
                    message: 'Dokter belum dipilih!'
                }
            }
        }
    }
});