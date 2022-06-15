
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

var verfPass = 0;
var verfEmail = 0;

var checkPass = function() {
    if (document.getElementById('password').value == document.getElementById('confirmPassword').value) {
        document.getElementById('passwordCheck').style.color = 'green';
        document.getElementById('passwordCheck').innerHTML = 'The passwords match';
        verfPass = 1;
    } else {
        document.getElementById('passwordCheck').style.color = 'red';
        document.getElementById('passwordCheck').innerHTML = 'The passwords do not match';
        verfPass = 0;
    }
}

var checkEmail = function() {
    if (document.getElementById('email').value == document.getElementById('confirmEmail').value) {
        document.getElementById('emailCheck').style.color = 'green';
        document.getElementById('emailCheck').innerHTML = 'The email addresses match';
        verfEmail = 1;
    } else {
        document.getElementById('emailCheck').style.color = 'red';
        document.getElementById('emailCheck').innerHTML = 'The email addresses do not match';
        verfEmail = 0;
    }
}


function signUp(form){

    var newLine = "\r\n"
    var msg = ""

    if (verfPass == 1 && verfEmail== 1) {
        document.getElementById("formSignUp").submit();
    }
    else {
        if (verfPass == 0 && verfEmail== 0) {
            msg = "The email addresses do not match";
            msg += newLine;
            msg += "The passwords do not match";
        }
        else if (verfPass == 1 && verfEmail == 0) {
            msg = "The email addresses do not match";
        }
        else if (verfPass == 0 && verfEmail == 1) {
            msg = "The passwords do not match";
        }
        else {
            msg = "Other error"
        }

        alert(msg);
    }

}


