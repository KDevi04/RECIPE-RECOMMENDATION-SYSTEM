<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="datastyle.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM login WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-group">
      <input type="checkbox" id="agreeCheckbox">
      <label for="agreeCheckbox">I agree to the terms and conditions</label>
    </div>
        <div class="form-group">
      <input type="submit" value="Login" name="login" class="btn-login" disabled>
      <input type="button" value="Sign Up" class="btn-signup" onclick="window.location.href='registration.php'" disabled>
    </div>
      </form>
</div>

    <script>
  document.getElementById('agreeCheckbox').addEventListener('click', function() {var termsAndConditions = `Terms and Conditions:
1. "Welcome to Nutrilicious! By accessing and using our website, you agree to comply with these terms and conditions."
2. "Our platform offers personalized recipe recommendations and dietary plans tailored to your nutritional needs and preferences."
3. "All content provided on Nutrilicious, including recipes, nutritional information, and diet plans, is for informational purposes only and should not replace professional medical advice."
4. "While we strive to provide accurate and up-to-date information, we do not guarantee the completeness or accuracy of the content on our website."
5. "Users are responsible for making informed decisions about their health and dietary choices based on the information provided by Nutrilicious."
6. "By using our services, you acknowledge that Nutrilicious is not liable for any damages or losses resulting from reliance on the information presented on our website."

**Please note that these terms and conditions are for illustrative purposes only and may need to be reviewed by a legal professional to ensure compliance with applicable laws and regulations.**
    `;
    alert(termsAndConditions);
    var agreeCheckbox = document.getElementById('agreeCheckbox');
    var loginButton = document.querySelector('.btn-login');
    var signupButton = document.querySelector('.btn-signup');
    // Enable/disable login and signup buttons based on checkbox state
    if (agreeCheckbox.checked) {
      loginButton.disabled = false;
      signupButton.disabled = false;
    } else {
      loginButton.disabled = true;
      signupButton.disabled = true;
    }
  });
</script>

</body>
</html>
