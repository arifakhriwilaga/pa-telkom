$(document).ready(function () {
    var text = $('#question'),
            btn = $('.btn-show'),
            h = text[0].scrollHeight;

    if (h > 95) {
        btn.addClass('more');
        btn.text('Show More');
        text.addClass('question');
    }
    btn.click(function (e) {
        e.stopPropagation();
        if (btn.hasClass('more')) {
            btn.removeClass('more');
            btn.addClass('less');
            btn.text('Show Less');
            text.removeClass('question');
        } else {
            btn.addClass('more');
            btn.removeClass('less');
            btn.text('Show More');
            text.addClass('question');
        }
    });

});