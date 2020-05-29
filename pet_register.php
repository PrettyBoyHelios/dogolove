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
        $profile = $_FILES['profileInput'];
        $file_name = uploadImage($profile['name'], $profile['size'], $profile['tmp_name']);
        if ($file_name != ""){
            $user->hasDog=1;
            $user->dogName = $_POST['dog_name'];
            $user->dogBirth = $_POST['dog_birth'];
            $user->dogBreed = $_POST['dog_breed'];
            $user->img = $file_name;
            header("Location: home.php");
        } else {
            header("Location: home.php");
        }
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
            <form method="post" enctype="multipart/form-data">
                <img src="img/dog.svg" alt="dog">
                <p class="subheading">Please add your best friend's info.</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-paw"></i>
                    </div>
                    <div class="div">
                        <h5>your dog's name</h5>
                        <input required type="text" name="dog_name" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="div">
                        <h5>birth date</h5>
                        <input required type="date" name="dog_birth" class="input">
                    </div>
                </div>
                <div class="form-group">
                    <label>Breed</label>
                    <select class="form-control" name="dog_breed">
                        <option value="Labrador">Labrador</option>
                        <option value="Golden Retriever">Golden Retriever</option>
                        <option value="Dalmatian">Dalmatian</option>
                        <option value="Pitbull">Pitbull</option>
                        <option value="Pug">Pug</option>
                    </select>
                </div>
                <div class="upload-btn-wrapper">
                    <button class="wrapper-btn">add a profile pic</button>
                    <input required type="file" name="profileInput" />
                </div>
                <!-- <input type="submit" class="btn" value="Login"> -->
                <button type="submit" id="submitID" name="submitBtn" class="btn"><i class="fas fa-paw"></i> Register</button>
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