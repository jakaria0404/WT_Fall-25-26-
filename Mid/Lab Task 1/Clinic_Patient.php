<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>

    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f6fa;
        margin: 0;
        padding: 0;
      }

      h1 {
        color: #0a3d62;
        text-align: center;
        margin-top: 30px;
      }

      table {
        margin: 30px auto;
        background: #b59356ff;
        border-radius: 10px;
        padding: 25px 40px;
        width: 400px;
      }

      td {
        padding: 8px;
        font-size: 16px;
        color: #222;
      }

      input[type="text"],
      input[type="number"],
      input[type="tel"],
      input[type="email"],
      input[type="password"],
      select,
      input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        outline: none;
        box-sizing: border-box; 
      }

      input[type="text"]:focus,
      input[type="number"]:focus,
      input[type="tel"]:focus,
      input[type="email"]:focus,
      input[type="password"]:focus,
      select:focus {
        border-color: #0a3d62;
        box-shadow: 0 0 5px rgba(10, 61, 98, 0.3);
      }

      input[type="submit"] {
        background-color: #0a3d62;
        color: white;
        border: none;
        margin-top: 12px;
        cursor: pointer;
        transition: 0.3s;
      }

      input[type="submit"]:hover {
        background-color: #1e5a86;
      }

      h2 {
        color: #0a3d62;
        text-align: center;
      }
    </style>
  </head>

  <body>
    <h1>Clinic Patient Registration</h1>

    
      <table>
        <tr><td>Full Name:</td></tr>
        <tr><td><input type="text" name="full_name" required></td></tr>

        <tr><td>Age:</td></tr>
        <tr><td><input type="number" name="age" required></td></tr>

        <tr><td>Phone Number:</td></tr>
        <tr><td><input type="tel" name="phone_number" required></td></tr>

        <tr><td>Email Address:</td></tr>
        <tr><td><input type="email" name="email" required></td></tr>

        <tr><td>Insurance Provider:</td></tr>
        <tr>
          <td>
            <select name="provider" required>
              <option value="">Select Provider</option>
              <option value="Aetna">Aetna</option>
              <option value="BlueCross">Blue Cross</option>
              <option value="UnitedHealth">United Health</option>
            </select>
          </td>
        </tr>

        <tr><td>Insurance Policy Number:</td></tr>
        <tr><td><input type="text" name="insurance_policy_number" required></td></tr>

        <tr><td><h2>Additional Information</h2></td></tr>

        <tr><td>Username:</td></tr>
        <tr><td><input type="text" name="username" required></td></tr>

        <tr><td>Password:</td></tr>
        <tr><td><input type="password" name="password" required></td></tr>

        <tr><td>Confirm Password:</td></tr>
        <tr><td><input type="password" name="confirm_password" required></td></tr>

        <tr>
          <td>
            <input type="submit" value="Register">
          </td>
        </tr>
      </table>
   
  </body>
</html>
