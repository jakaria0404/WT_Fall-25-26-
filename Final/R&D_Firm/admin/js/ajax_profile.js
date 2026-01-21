function updateProfile() {
    var fname = document.getElementById("first_name").value;
    var lname = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var msg = document.getElementById("msg");

    if (fname == "" || lname == "" || email == "") {
        msg.innerHTML = "Error: All fields are required!";
        msg.style.color = "red";
        return;
    }

    var xhttp = new XMLHttpRequest(); 
    var myForm = document.getElementById("profileForm");
    var formData = new FormData(myForm);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            msg.innerHTML = this.responseText;
            if (this.responseText.indexOf("Error") !== -1 || this.responseText.indexOf("failed") !== -1) {
                msg.style.color = "red";
            } else {
                msg.style.color = "green";
            }
        }
    };

    xhttp.open("POST", "../php/profile.php?ajax=true", true);
    xhttp.send(formData);
}
