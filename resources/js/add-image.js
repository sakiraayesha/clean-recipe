$(function() {
    $('#image').on('change', function () {
        $('#preview-image').attr('src', URL.createObjectURL(this.files[0]));
        $('#preview-image').show();
        $('.image-remove-icon').show();
        $('#preview-image').onload = () => URL.revokeObjectURL($('#preview-image').attr('src'));
    });

    $('.image-remove-icon').on('click', function () {
        $('#preview-image').attr('src', '');
        $('#preview-image').hide();
        $('.image-remove-icon').hide();
    });
});