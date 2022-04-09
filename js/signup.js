function showPass(){
    const fields = [password, confirmPassword]

    fields.forEach( x => {
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });
}

var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("The passwords entered don't match");
    } else {
        confirm_password.setCustomValidity("The passwords entered don't match");
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


var email = document.getElementById("email")
    , confirm_email = document.getElementById("confirmEmail");

function validateEmail(){
    if(email.value != confirm_email.value) {
        confirm_email.setCustomValidity("The emails entered don't match");
    } else {
        confirm_email.setCustomValidity("The emails entered don't match");
    }
}

email.onchange = validateEmail;
confirm_email.onkeyup = validateEmail;



