

$(window).load(function()
{
    function checkForm()
    {
        alert(123);
        var tt = 'set';
        $('#er_email').text(tt);
    }


    $('#button_feedback').submit(checkForm);

});