
function showPass(){
    const fields = [password, confirmPassword];

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
    if (document.getElementById('password').value === document.getElementById('confirmPassword').value) {
        document.getElementById('passwordCheck').style.color = 'green';
        document.getElementById('passwordCheck').innerHTML = 'The passwords match';
        verfPass = 1;
    } else {
        document.getElementById('passwordCheck').style.color = 'red';
        document.getElementById('passwordCheck').innerHTML = 'The passwords do not match';
        verfPass = 0;
    }
};

var checkEmail = function() {
    if (document.getElementById('email').value === document.getElementById('confirmEmail').value) {
        document.getElementById('emailCheck').style.color = 'green';
        document.getElementById('emailCheck').innerHTML = 'The email addresses match';
        verfEmail = 1;
    } else {
        document.getElementById('emailCheck').style.color = 'red';
        document.getElementById('emailCheck').innerHTML = 'The email addresses do not match';
        verfEmail = 0;
    }
};


function signUp(){

    var newLine = "\r\n";
    var msg = "";

    var validUsername = 1;
    var validEmail = 1;
    var validPassword = 1;

    var usernameFormat = /^[0-9A-Za-z]+$/;
    var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var passwordFormat = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[a-zA-Z~`!@#$%^&*()_+={}:;<>,.?/'"-])[a-zA-Z0-9~`!@#$%^&*()_+={}:;<>,.?/'"-]{6,}$/;


    if(document.getElementById('username').value === '') {
        msg = "The Username section cannot be empty";
        msg += newLine;
        validUsername = 0;
    }
    else if((document.getElementById('username').value).match(usernameFormat) === null) {
        msg += "Your Username can only contain alphanumeric characters";
        msg += newLine;
        validUsername = 0;
    }


    if (verfPass === 1 && verfEmail === 0) {

        validEmail = 0;

        if(document.getElementById('email').value === '') {
            msg += "The Email section cannot be empty";
        }
        else if(document.getElementById('confirmEmail').value === '') {
            msg += "The Confirm Email section cannot be empty";
        }
        else{
            msg += "The email addresses do not match";
        }

    }
    else if (verfPass === 0 && verfEmail === 1) {

        validPassword = 0;

        if(document.getElementById('password').value === '') {
            msg += "The Password section cannot be empty";
        }
        else if(document.getElementById('confirmPassword').value === '') {
            msg += "The Confirm Password section cannot be empty";
        }
        else{
            msg += "The passwords do not match";
        }
    }
    else if (verfPass === 0 && verfEmail=== 0) {

        validPassword = 0;
        validEmail = 0;

        if(document.getElementById('email').value === '' && document.getElementById('confirmEmail').value === '') {
            msg += "The Email sections cannot be empty";
        }
        else if(document.getElementById('email').value === '') {
            msg += "The Email section cannot be empty";
        }
        else if(document.getElementById('confirmEmail').value === '') {
            msg += "The Confirm Email section cannot be empty";
        }
        else{
            msg += "The email addresses do not match";
        }

        msg += newLine;

        if(document.getElementById('password').value === '' && document.getElementById('confirmPassword').value === '') {
            msg += "The Password sections cannot be empty";
        }
        else if(document.getElementById('password').value === '') {
            msg += "The Password section cannot be empty";
        }
        else if(document.getElementById('confirmPassword').value === '') {
            msg += "The Confirm Password section cannot be empty";
        }
        else{
            msg += "The passwords do not match";
        }

    }
    else {
        if((document.getElementById('email').value).match(emailFormat) === null) {
            msg += "You have introduced an invalid email address";
            msg += newLine;
            validEmail = 0;
        }

        if((document.getElementById('password').value).match(passwordFormat) === null) {
            msg += "You have introduced an invalid password";
            msg += newLine;
            msg += "Your password must have at least 6 characters, 1 digit and 1 special character";
            msg += newLine;
            validPassword = 0;
        }
    }


    if (verfPass === 1 && verfEmail=== 1 && validUsername === 1 && validEmail === 1 && validPassword === 1) {
        document.getElementById("formSignUp").submit();
        document.getElementById("formSignUp").reset();
    }
    else {
        alert(msg);
    }


}


