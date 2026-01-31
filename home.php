<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Nutrilicious</title>
  <link rel="stylesheet" href="home.css">
</head>
<body>
  <div class="landing-page">
    <img src="/RECIPE_(2)[1]/RECIPE/logo (3).png" alt="Nutrilicious Logo">
    <h1 style="size: 24px;color:black;text-align: center;margin-top: 0%;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Welcome to Nutrilicious! Healthy yet Delicious!!</h1>
    <button class="open-button"onclick="openHomepage()">Open</button>
  </div>
  <div class="curtain">
  <script>
    function openHomepage() {
      document.querySelector('.curtain').classList.add('open');
      setTimeout(function() {
        window.location.href="/RECIPE_(2)[1]/RECIPE/Main.php";
      }, 1000);
    }
  </script>
  </div>
</body>
</html>