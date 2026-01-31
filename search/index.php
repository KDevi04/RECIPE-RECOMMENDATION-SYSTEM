<?php
session_start();

// Process form submission
if (isset($_POST["response"])) {
    include('database.php');
    $AGE = mysqli_real_escape_string($conn, $_POST["AGE"]);
    $WEIGHT = mysqli_real_escape_string($conn, $_POST["WEIGHT"]);
    $PLAN = mysqli_real_escape_string($conn, $_POST["PLAN"]);
    $sqlInsert = "INSERT INTO weightplan(AGE,WEIGHT,PLAN) VALUES ('$AGE','$WEIGHT','$PLAN')";
    if (mysqli_query($conn, $sqlInsert)) {
        $_SESSION["response"] = "Feedback Added Successfully!";
        
        // Redirect to appropriate page based on diet plan
        if ($PLAN == "WEIGHT GAIN PLAN") {
            header("Location:weightlossmonthlyplan.php");
        } elseif ($PLAN == "WEIGHT LOSS PLAN") {
            header("Location:weightlossdiet.php");
        } else {
            // If no specific plan is selected, redirect to a default page
            header("Location: default_page.php");
        }
        exit(); // Always exit after redirection
    } else {
        die("Something went wrong");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>WEIGHT PLAN</title>
    <style>
        body {
            background-color:black;
            color:white;
        }
        table td {
            vertical-align: middle;
            text-align: left;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            padding: 20px!important;
            color:white;
            background-color: black;
            font-size:15px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>START YOUR DIET PLAN WITH NUTRILICIOUS</h1>
            <div>
                <a href="logout.php" class="btn btn-warning" style="margin-left: 48%;">Logout</a>
            </div>
        </header>
        <?php
        if (isset($_SESSION["response"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["response"];
            ?>
        </div>
        <?php
        unset($_SESSION["response"]);
        }
        ?>
        <form action="index.php" method="post">
            <table class="table table-bordered" style="border: no-border">
                <tr>
                    <td>SELECT YOUR AGE</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AGE" id="age_under_25" value="UNDER 25 YEARS">
                            <label class="form-check-label" for="age_under_25">UNDER 25 YEARS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AGE" id="age_26_35" value="26-35 YEARS">
                            <label class="form-check-label" for="age_26_35">26-35 YEARS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AGE" id="age_36_50" value="36-50 YEARS">
                            <label class="form-check-label" for="age_36_50">36-50 YEARS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AGE" id="age_above_50" value="ABOVE 50 YEARS">
                            <label class="form-check-label" for="age_above_50">ABOVE 50 YEARS</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:40%">SELECT YOUR CURRENT WEIGHT(in kg)</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="WEIGHT" id="weight_below_40" value="BELOW 40 KG">
                            <label class="form-check-label" for="weight_below_40">BELOW 40 KG</label>
                        </div>
                        <!-- Other options for WEIGHT -->
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="WEIGHT" id="flexRadioDefault2" value="41-55 KG">
                        <label class="form-check-label" for="flexRadioDefault2">
                            41-55 KG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="WEIGHT" id="flexRadioDefault3" value="56-70 KG">
                        <label class="form-check-label" for="flexRadioDefault3">
                            56-70 KG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="WEIGHT" id="flexRadioDefault4" value="71-85 KG">
                        <label class="form-check-label" for="flexRadioDefault4">
                            71-85 KG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="WEIGHT" id="flexRadioDefault4" value="86-100 KG">
                        <label class="form-check-label" for="flexRadioDefault4">
                            86-100 KG
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="WEIGHT" id="flexRadioDefault4" value="ABOVE 100 KG">
                        <label class="form-check-label" for="flexRadioDefault4">
                            ABOVE 100 KG
                        </label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>PLEASE CHOOSE YOUR DIET PLAN</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PLAN" id="plan_weight_gain" value="WEIGHT GAIN PLAN">
                            <label class="form-check-label" for="plan_weight_gain">WEIGHT GAIN PLAN</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PLAN" id="plan_weight_loss" value="WEIGHT LOSS PLAN">
                            <label class="form-check-label" for="plan_weight_loss">WEIGHT LOSS PLAN</label>
                        </div>
                </td>
                </tr>
            </table>
            
           <p style="margin-top:4%;"><b> * ADVISORY : IT IS NOT ADVICED TO FOLLOW THE PRESCRIBED DEITARY PLAN IF THE USER HAS SOME SERIOUS HEALTH ISSUES.</b></p>
            
            <div class="form-element my-4" style="text-align:right">
                <input type="submit" name="response" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script>
        // Check if the session variable is set and if it is, show the alert
        <?php if(isset($_SESSION["user"]) && $_SESSION["user"] === "yes"): ?>
            alert("Logged in!");
        <?php endif; ?>
    </script>
</body>
</html>
