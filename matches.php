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
                <i class="fas fa-2x fa-heart" style="color: red; float: right;margin: 5px 5px 0 0"></i>
            </a>
        </div>
    </div>

    <br/>
    <?php getMatches($user) ?>
</div>




<?php include ("bottom.php");?>
</body>
</html>