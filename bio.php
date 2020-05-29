<?php
    include("db.php");
    include("console.php");
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location: index.php");
    }
?>
<?php
    include ("image_handler.php");
    if (isset($_POST['submitBtn'])) {
        $user = getUserInfo($_SESSION['userId']);


        $user->bio=$_POST['bioInput'];
        updateUserInfo($user);
        header("Location: profile.php");

    }
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
                <h3 class="subheading">Please add the best description for you and your best friend.</h3>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea maxlength="280" class="form-control" id="bio" name="bioInput" rows="5"></textarea>
                </div>
                <!-- <input type="submit" class="btn" value="Login"> -->
                <button type="submit" id="submitID" name="submitBtn" class="btn"><i class="fas fa-paw"></i> Update Bio</button>
            </form>
            <!------------ FORM ------------>
        </div>
    </div>
</div><!-- end containerDiv -->

<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->

<?php include ("bottom.php");?>
</body>
</html>