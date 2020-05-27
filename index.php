<!DOCTYPE html>
<html>
    <head>
        <title>DOGOLOVE</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
	    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">DogLove</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pricing.html">Pricing</a>
                </li>
              </ul>
              <span class="navbar-text" style="color: #fff;">
               A man's best friend needs a best friend too!
              </span>
            </div>
          </nav>


        <img class="heart" src="img/heart2.svg">
        <div class="container">
            <div class="img">
                <img src="img/love.svg">
            </div>
            <div class="login-content">
                <form action="index.html">
                    <img src="img/dog.svg">
                    <h2 class="title">Welcome</h2>
                    <div class="input-div one">
                          <div class="i">
                                  <i class="fas fa-user"></i>
                          </div>
                          <div class="div">
                                  <h5>e-mail</h5>
                                  <input type="email" class="input">
                          </div>
                       </div>
                       <div class="input-div pass">
                          <div class="i"> 
                               <i class="fas fa-lock"></i>
                          </div>
                          <div class="div">
                               <h5>password</h5>
                               <input type="password" class="input">
                       </div>
                    </div>
                    <a href="#">Register</a>
                    <a href="#">Forgot Password?</a>
                    <!-- <input type="submit" class="btn" value="Login"> -->
                    <button type="submit" id="submitID" name="submitBtn" class="btn">Login</button>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- php -->

  <?php
    if(isset($_POST['submitBtn'])){
      $Servername = "localhost";
      $Username = "root";
      $Password = "";
      $DBName = "admindb";
      $conn = mysqli_connect($Servername,$Username,$Password,$DBName);

      if(!$conn)
      {
          die("Connection failed:". mysqli_connect_error());
      }
      

        $sql = "SELECT * FROM users WHERE user = '" . $_POST['userInput'] . "' AND pass = '" . $_POST['passInput']."'";
        
        $result = $conn->query($sql);
        if($result && $result->num_rows == 1) {
          while ($row = mysqli_fetch_assoc($result)) {
            $idT = $row['id'];
            $sql2 = "SELECT managers.userID as id FROM managers where managers.userID = '$idT'";
            $result2 = $conn->query($sql2);
            
            session_start();
            if($result2 && $result2->num_rows > 0) {
            $_SESSION['role'] = 'manager';
            }
            else{
              $_SESSION['role'] = 'seller';
            }
          }
          header("Location: salesadmin.php");
        }
        else {
          echo "User not found";
        }
        $conn->close();
    }
  ?>
        <!-- php final -->
    </body>
</html>