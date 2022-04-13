function showLoginPass() {
    var x = document.getElementById("showLPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
