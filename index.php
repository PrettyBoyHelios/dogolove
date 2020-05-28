<?php
    include("db.php");
    include("console.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DOGOLOVE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .spinner {
            display: block;
            position: fixed;
            top: 45%;
            right: 48%; /* or: left: 50%; */
            margin-top: -. . px; /* have of the elements height */
            margin-right: -. . px; /* have of the elements widht */
        }
    </style>
</head>
<body>
<?php
    include("menu.php");
?>

<div id="containerDiv">
    <img class="heart" src="img/heart2.svg">
    <div class="container">
        <div class="img">
            <img src="img/love.svg">
        </div>
        <div class="login-content">
            <!------------ FORM ------------>
            <form method="post">
                <img src="img/dog.svg" alt="dog">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>e-mail</h5>
                        <input type="text" name="userInput" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>password</h5>
                        <input type="password" name="passInput" class="input">
                    </div>
                </div>
                <a href="#">Register</a>
                <a href="#">Forgot Password?</a>
                <!-- <input type="submit" class="btn" value="Login"> -->
                <button type="submit" id="submitID" name="submitBtn" class="btn">Login</button>
            </form>
            <!------------ FORM ------------>
        </div>
    </div>
</div><!-- end containerDiv -->
<!-- php -->

<?php
    if (isset($_POST['submitBtn'])) {
        $conn = getDb();
        if (!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        $sql = "SELECT * FROM users WHERE user = '" . $_POST['userInput'] . "' AND password = '" . $_POST['passInput'] . "'";

        $result = $conn->query($sql);
        $conn->close();
        if ($result && $result->num_rows == 1) {
            session_start();
            $_SESSION['userId'] = 1;
            header("Location: home.php");
        } else {
            debug_to_console("user not found!");
            echo "User not found";
        }
    }
?>
<!-- php final -->

<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->

<?php include ("bottom.php");?>
</body>
</html>