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
        <div class="card" style="width: 100%; border-radius: 20px;">
            <img style="border-radius: 20px 20px 0 0" src="https://occ-0-1068-92.1.nflxso.net/dnm/api/v6/9pS1daC2n6UGc3dUogvWIPMR_OU/AAAABZI-s_EPRYLfGYlu-ekFjbcqgyRyCbvOZJseXK0KqAjFrViOAOoyeD9AGAWVMv_LUqQGSwtvv6KWu5pE7st22o-MppBG7PRIOcS8_L-QHmCEKEuI.jpg?r=ef9" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mr. Peanutbutter, age 23</h5>
                <p class="card-text">Star of Mr peanutbutter's House and best buds with @BoJackHorseman</p>
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
                    <img src="https://pm1.narvii.com/6599/feb27b001361baacef442e70f5e10769a387e7ed_00.jpg" alt="..." class="avatar">
                    <div class="card-body">
                        <h5 class="card-title">Owner Info</h5>
                        <p class="card-text">Diane Nguyen, 3km</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php include ("bottom.php");?>
</body>
</html>