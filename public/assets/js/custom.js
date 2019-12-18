// Write your custom JS here
$(document).ready(function () {
    initPlugin();
    initImageAveter();
});

function initPlugin() {
    $('select').select2({
        placeholder: "Select Category"
    });
    tinymce.init({
        selector: 'textarea',
        height: "380"
    });
    $('.price').mask("#.##0,00", {reverse: true});
    $('.tax').mask('##0,00%', {reverse: true});
    tippy('[data-tippy-content]');

    $(".elevateZoom").elevateZoom();
}

function initImageAveter() {
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });
}
