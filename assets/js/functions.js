$('[data-toggle="popover"]').popover({
    html: true,
    content: function () {
        return $('#popover-content-profile').html();
    },
    placement: "bottom"
});
if (user_id) {
    count_notification();
}
function imgError(image) {
    image.onerror = "";
    image.src = base_url('assets/images/home/header/default-avatar.png');
    return true;
}

function count_notification() {
    $.ajax({
        url: site_url('front_end/notification/count_notif'),
        type: 'POST',
        data: {
            user_id: user_id
        }
    }).done(function (data) {
        if(data > 0) {
            $('#count-notif').addClass('badge1');        
            $('#count-notif').attr('data-badge', data);        
        } else {
            $('#count-notif').removeClass('badge1');        
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
        console.log(msg);
    });
    setTimeout(function () {
        count_notification();
    }, 3000);
}