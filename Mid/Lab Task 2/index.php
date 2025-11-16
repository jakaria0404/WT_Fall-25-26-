<!DOCTYPE html>
<html>
<head>
    <title>Participant Registration</title>
    <style>
        body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f0f8ff;
    }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        #error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        #output, #activity_list {
            background: #fff;
            padding: 15px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            
        }
    </style>
</head>
<body>

    <h1>Participant Registration</h1>

   
    <form onsubmit="return submitForm()">
        
        <label>Full Name:</label><br>
        <input type="text" id="full_name" required><br><br>

        <label>Email:</label><br>
        <input type="email" id="email" required><br><br>

        <label>Phone Number:</label><br>
        <input type="tel" id="phone_number" required><br><br>

        <label>Password:</label><br>
        <input type="password" id="password" required><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" id="confirm_password" required><br><br>

        <button type="submit">Register</button>
    </form>

    <div id="error"></div>
    <div id="output"></div>

    <br><br>

    
    <h1>Activity Selection</h1>

    <form onsubmit="return addActivity()">
        <label>Activity Name:</label><br>
        <input type="text" id="activity_name" required><br><br>

        <button type="submit">Add Activity</button>
    </form>

    
<script>
    function submitForm(){
        var name=document.getElementById('full_name').value;
        var email=document.getElementById('email').value;
        var phone=document.getElementById('phone_number').value;
        var password=document.getElementById('password').value;
        var confirm_password=document.getElementById('confirm_password').value;

        var error_div=document.getElementById('error');
        var output_div=document.getElementById('output');

        error_div.innerHTML="";
        output_div.innerHTML="";

        if(name=="" || email=="" || phone=="" || password=="" || confirm_password==""){
            error_div.innerHTML="All fields are required.";
            return false;
        }
        if(password!==confirm_password){
            error_div.innerHTML="Passwords do not match.";
            return false;
        }
     if (!email.includes("@")){
            error_div.innerHTML="Invalid email format.";
            return false;
        }
        if (isNaN(phone)){
            error_div.innerHTML="Phone number must be numeric.";
            return false;
        }
        output_div.innerHTML = `
    <strong>Registration successful!</strong><br><br>
    Name: ${name}<br>
    Email: ${email}<br>
    Phone: ${phone}
    `;
        return false;   


    }
</script>
</body>
</html>
