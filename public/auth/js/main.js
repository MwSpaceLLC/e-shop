"use strict"

$(window).on("load", function () {
    $('.btn-forget').on('click', function (e) {
        e.preventDefault();
        $('.form-items', '.form-content').addClass('hide-it');
        $('.form-sent', '.form-content').addClass('show-it');
    });
    $('.btn-tab-next').on('click', function (e) {
        e.preventDefault();
        $('.nav-tabs .nav-item > .active').parent().next('li').find('a').trigger('click');
    });
});

// Mwspace prevent form (html only)
function preventLogin() {
    submit.setAttribute('disabled', true);
    submit.classList.add('disabled');
    submit.innerHTML = '<i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;wait...';
    return true;
}
