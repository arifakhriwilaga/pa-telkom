var config = {
        toastr : {
            closeButton:true,
            tapToDismiss: true,
            toastClass: 'toast',
            containerId: 'toast-container',
            debug: false,

            showMethod: 'fadeIn', //fadeIn, slideDown, and show are built into jQuery
            showDuration: 300,
            showEasing: 'swing', //swing and linear are built into jQuery
            onShown: undefined,
            hideMethod: 'fadeOut',
            hideDuration: 1000,
            hideEasing: 'swing',
            onHidden: undefined,
            closeMethod: false,
            closeDuration: false,
            closeEasing: false,
            closeOnHover: true,

            extendedTimeOut: 1000,
            iconClasses: {
                error: 'toast-error',
                info: 'toast-info',
                success: 'toast-success',
                warning: 'toast-warning'
            },
            
            positionClass: 'toast-top-right',
            timeOut: 5000, // Set timeOut and extendedTimeOut to 0 to make it sticky
            titleClass: 'toast-title',
            messageClass: 'toast-message',
            escapeHtml: false,
            target: 'body',
            closeHtml: '<button type="button">&times;</button>',
            closeClass: 'toast-close-button',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true,
            progressClass: 'toast-progress',
            rtl: false
        }
    }

$('[data-toggle="popover"]').popover({
    html: true,
    content: function () {
        return $('#popover-content-profile').html();
    },
    placement: "bottom"
});

function imgError(image) {
    image.onerror = "";
    image.src = base_url('assets/images/home/header/default-avatar.png');
    return true;
}

function count_notification(user_id) {
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
        setTimeout(function () {
            count_notification(user_id);
        }, 3000);
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
}