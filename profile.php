<?php
    include ("db.php");
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location: index.php");
    }
    $user = getUserInfo($_SESSION['userId']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
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
                <i class="fas fa-2x fa-heart" style="color: red; float: right;margin: 5px 5px 0 0"></i>
            </a>
        </div>
    </div>

    <br/>
    <?php if ($user->hasDog){?>
        <div class="card" style="width: 100%; border-radius: 20px;">
            <img style="border-radius: 20px 20px 0 0" src="images/<?php echo $user->img?>" class="card-img-top" style="max-height: 50px !important;" alt="...">
            <div class="card-body">
                <h1 class="card-title"><?php echo $user->dogName . ", born on " . $user->dogBirth ?></h1>
                <p class="card-text"><?php echo $user->dogBreed?></p>
            </div>
        </div>
    <?php } else {?>
        Add a pet!
    <?php } ?>

    <div class="card like-zone" style="width: 100%; border-radius: 20px;">
        <div class="row">
            <div class="col" style="width: 100px">
                <img src="images/<?php echo $user->profile?>" alt="..." class="avatar">
                <div class="card-body">
                    <h1 class="card-title"><?php echo $user->name . " " . $user->lastName . ", " . getUserAge($user) . " years"?></h1>
                    <h5 class="card-subtitle mb-2 text-muted">Owner Info</h5>
                    <p class="card-text"><i class="fab fa-whatsapp"></i> +<?php echo $user->phone?></p>
                    <p class="card-text"><i class="fas fa-user"></i> <?php echo $user->bio?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ("bottom.php");?>
</body>
</html>