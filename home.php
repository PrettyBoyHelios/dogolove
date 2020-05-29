<?php
    include ("db.php");
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location: index.php");
    }
    $user = getUserInfo($_SESSION['userId']);
    if (!$user->hasDog) {
        header("Location: pet_register.php");
    }
    $otherProfile = getOtherProfiles($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
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
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Hola, <?php echo $_SESSION['name']?>!</h2>
            </div>
            <div class="col">
                <a href="matches.php">
                    <i class="fas fa-2x fa-heart" style="color: #C4828B; float: right;margin: 5px 5px 0 0"></i>
                </a>
            </div>
        </div>

        <br/>
        <div class="card" style="width: 100%; border-radius: 20px;">
            <img style="border-radius: 20px 20px 0 0" src="images/<?php echo $otherProfile->img ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $otherProfile->dogName?></h5>
                <p class="card-text"><?php echo $otherProfile->dogBreed ?></p>
            </div>
        </div>
        <div class="row like-zone">
            <div class="col text-center">
                <button class="nay-button">
                    <i class="fas fa-times" style="color: white"></i>
                </button>
            </div>
            <div class="col text-center">
                <button class="yay-button">
                    <i class="fas fa-heart" style="color: white"></i>
                </button>
            </div>
        </div>

        <div class="card like-zone" style="width: 100%; border-radius: 20px;">
            <div class="row">
                <div class="col" style="width: 100px">
                    <img src="images/<?php echo $otherProfile->profile ?>" alt="..." class="avatar">
                    <div class="card-body">
                        <h5 class="card-title">Owner Info</h5>
                        <p class="card-text"><?php echo $otherProfile->name . " " . $otherProfile->lastName ?>, 3km</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ("bottom.php");?>
</body>
</html>