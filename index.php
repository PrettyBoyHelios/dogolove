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
    <div class="sp-container">
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
                <a href="register.php">Register</a>
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
            $row = mysqli_fetch_assoc($result);
            print_r($row);
            $_SESSION['userId'] = $row['idusers'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['lastName'] = $row['last_name'];
            header("Location: home.php");
        } else {
            debug_to_console("user not found!");
            echo "User not found";
        }

        $query = mysqli_query($conn, "select * from users where Password='$pass' and Username='$user'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            $row = mysqli_fetch_assoc($query);
            $_SESSION['user'] = $row['Id'];
            $_SESSION['name'] = $row['FirstName'];
            $_SESSION['isAdmin'] = $row['IsAdmin'];
            $_SESSION['data'] = print_r($row, true);
            header("Location: index.php"); // Redirecting to other page
        }
        else
        {
            echo 'not found!';
            $err = "Username of Password is Invalid";
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