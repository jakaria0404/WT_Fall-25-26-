function updateProfile() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var uname = document.getElementById("uname").value;
    var email = document.getElementById("email").value;
    var msg = document.getElementById("msg");

    if (fname == "" || lname == "" || uname == "" || email == "") {
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
            msg.style.color = "green";
            document.getElementById("display_name").innerHTML = uname;
        }
    };

    xhttp.open("POST", "profile.php?ajax=true", true);
    xhttp.send(formData);
}