$(document).on('click', '#btnRegister', function () {
    $.ajax({
        method: "GET",
        async: false,
        url: "/ajax-user",
    }).done(function(data) {
        var count = Object.keys(data).length;
        function validateusername(){
            var username = document.getElementById("username");
            for(var i = 0; i < count; i++){
                var obj = data[i];
                if(obj.username == username.value)
                {
                    return true;
                }
            }
            return false;
        }
        function validateEmail(){
            var email = document.getElementById("email");
            for(var i = 0; i < count; i++){
                var obj = data[i];
                if(obj.email == email.value)
                {
                    return true;
                }
            }
            return false;
        }
        if(validateusername() == true){
            username.onchange = validateusername;
            username.onkeyup = validateusername;
            username.setCustomValidity(Lang.get("messages.validate_username") + " " +username.value + " " + Lang.get("messages.validate_exist"));
            $('#user').focus();
        }
        else
        {
            username.setCustomValidity("");
        }

        if(validateEmail() == true){
            email.onchange = validateEmail;
            email.onkeyup = validateEmail;
            email.setCustomValidity(Lang.get("messages.validate_email") + " " + email.value + " " +Lang.get("messages.validate_exist"));
            $('#email').focus();
        }
        else
        {
            email.setCustomValidity("");
        }

        var password = document.getElementById("password");
        var password_confirmation = document.getElementById("password-confirm");
        if(password.value != password_confirmation.value)
        {
            password_confirmation.setCustomValidity(Lang.get("messages.validate_re_password"));
            $('#password-confirm').focus();
        }
        else
        {
            password_confirmation.setCustomValidity("");
        }
    });
});
