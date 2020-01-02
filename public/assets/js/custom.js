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
        selector: 'textarea.tiny',
        height: "380"
    });
    $('.price').mask("#.##0,00", {reverse: true});
    $('.tax').mask('##0,00%', {reverse: true});
    $('.phone').mask('+00 ### ## ## ###');
    $('.vat').mask('SS AAAAAAAAAAAA');

    tippy('[data-tippy-content]');

    // var html_editor = ace.edit("ace-html");
    // html_editor.setTheme("ace/theme/twilight");
    // html_editor.session.setMode("ace/mode/html");

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

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
}
