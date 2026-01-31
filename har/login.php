<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cooking Recipes Login</title>
  <style>
    body {
            background-image: url("login.jpg");
            background-size:contain;
            background-position:center;
            font-family: Arial, sans-serif;

    }
    .container {
      width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      align-self: center;
    }
    
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      align-self: center;
    }
    
    .form-group .btn-login {
      display: inline-block;
      width: 48%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      background-color: blueviolet;
      color: #fff;
      cursor: pointer;
    }
    
    .form-group .btn-login:hover {
      opacity: 0.8;
    }

    .form-group .btn-signup {
      display: inline-block;
      width: 48%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      background-color: #f44336;
      color: #fff;
      cursor: pointer;
    }

    .form-group .btn-signup:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>LOGIN </h1>
    <form>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
  
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      
      <div class="form-group">
        <input type="submit" value="Login" class="btn-login">
        <input type="button" value="Sign Up" class="btn-signup" onclick="window.location.href='signup.html'">
        <a href="signup.html">    
        </a>
      </div>
    </form>
  </div>
</body>
</html>
