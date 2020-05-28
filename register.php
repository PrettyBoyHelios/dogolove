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
            <form method="post" enctype="multipart/form-data">
                <img src="img/dog.svg" alt="dog">
                <p class="subheading">Add your information first,  your friend's will come after.</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>username</h5>
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
                <div class="input-div">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>my name</h5>
                        <input type="text" name="nameInput" class="input">
                    </div>
                </div>
                <div class="input-div">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>my last name</h5>
                        <input type="text" name="lnameInput" class="input">
                    </div>
                </div>
                <div class="input-div">
                    <div class="i">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="div">
                        <h5>phone number</h5>
                        <input type="text" name="phoneInput" class="input">
                    </div>
                </div>
                <div class="upload-btn-wrapper">
                    <button class="wrapper-btn">add a profile pic</button>
                    <input type="file" name="profileInput" />
                </div>
                <!-- <input type="submit" class="btn" value="Login"> -->
                <button type="submit" id="submitID" name="submitBtn" class="btn">Register</button>
            </form>
            <!------------ FORM ------------>
        </div>
    </div>
</div><!-- end containerDiv -->
<!-- php -->

<?php
    include ("image_handler.php");
    if (isset($_POST['submitBtn'])) {
        $conn = getDb();
        if (!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        $username = $_POST['userInput'];
        $name = $_POST['nameInput'];
        $pass = $_POST['passwordInput'];
        $lastName = $_POST['lnameInput'];
        $phone = $_POST['phoneInput'];

        $profile = $_FILES['profileInput'];

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