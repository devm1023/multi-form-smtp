jQuery(document).ready(function($) {
    var progress = 0;
    $('.Form').first().css('left', '0');
    function setProgress() {
        $('#progress').css('width', progress + '%');
        $('#step-row .step-col small').css('left', progress / 2 + '%');
        $('#step-row .step-col small').html(progress + '%');
    }
    $('#mainForm .optionsBx .customNextBtn').on('click', function() {
        $(this).parents('.Form').css('left', '-100%');
        $(this).parents('.Form').next('.Form').css('left', '0');
        progress += 25;
        setProgress();
    });
    $('.BackBtn').on('click', function() {
        $(this).parents('.Form').css('left', '-100%');
        $(this).parents('.Form').prev('.Form').css('left', '0');
        progress -= 25;
        setProgress();
    });
    $('#checkedCtrl').on('click', function() {
        if( $(this).hasClass('fa-square-o') ) {
            $(this).removeClass('fa-square-o');
            $(this).addClass('fa-check-square-o');
            $('#isChecked').val('1');
        } else {
            $(this).removeClass('fa-check-square-o');
            $(this).addClass('fa-square-o');
            $('#isChecked').val('0');
        }
    });
});