
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

var checkPass = function() {
    if (document.getElementById('password').value == document.getElementById('confirmPassword').value) {
        document.getElementById('passwordCheck').style.color = 'green';
        document.getElementById('passwordCheck').innerHTML = 'The passwords match';
    } else {
        document.getElementById('passwordCheck').style.color = 'red';
        document.getElementById('passwordCheck').innerHTML = 'The passwords do not match';
    }
}

var checkEmail = function() {
    if (document.getElementById('email').value == document.getElementById('confirmEmail').value) {
        document.getElementById('emailCheck').style.color = 'green';
        document.getElementById('emailCheck').innerHTML = 'The email addresses match';
    } else {
        document.getElementById('emailCheck').style.color = 'red';
        document.getElementById('emailCheck').innerHTML = 'The email addresses do not match';
    }
}


