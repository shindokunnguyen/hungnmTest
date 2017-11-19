var HungnmController = {
    checkRePassword : function (el){
        var Password = $('#password').val();
        var RePassword = $(el).val();

        if (Password != RePassword) {
            $('#area_show_err').show();
            $('#area_show_err').html('re-password isnot match with password !');
            return;
        } else {
            $('#area_show_err').hide();
            $('#area_show_err').html('');
            return;
        }
    }
};