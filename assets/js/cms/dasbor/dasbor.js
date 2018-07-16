
var temp_foto = $('#profile-image').attr('data-foto');
$("#edit-profile #input-profile-picture").on('change', function () {
    
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("input-profile-picture").files[0]);
    
    oFReader.onload = function(oFREvent) {
        document.getElementById("profile-image").src = oFREvent.target.result;
    };
    $("#edit-profile .edit-photo").addClass('hide');
    $("#edit-profile .btn-remove").removeClass('hide');
    $("#edit-profile .btn-save").removeClass('hide');
});

$("#edit-profile .btn-remove").on('click', function () {
    document.getElementById("profile-image").src = temp_foto;
    $("#edit-profile .edit-photo").removeClass('hide');
    $("#edit-profile .btn-remove").addClass('hide');
    $("#edit-profile .btn-save").addClass('hide');
});

$("#edit-profile .btn-save").on('click', function () {
    $("#edit-profile .edit-photo").removeClass('hide');
    $("#edit-profile .btn-remove").addClass('hide');
    $("#edit-profile .btn-save").addClass('hide');
    $('#edit-profile').submit();

});
