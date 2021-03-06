<?php
    if (isset($_SESSION['userId'])) {
        echo '
              <div id="headerDiv">
                  <nav class="navbar navbar-expand-lg navbar-light">
                      <a class="navbar-brand" href="#"><i class="fas fa-paw"></i> LoveDog</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php"><i class="fas fa-compass"></i> Explore</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="matches.php"><i class="fas fa-heart"></i> Matches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="profile.php"><i class="fas fa-dog"></i> Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
                                </li>
                            </ul>
                            <span class="navbar-text" style="color: #fff;">
                                A man\'s best friend needs a best friend too!
                            </span>
                        </div>
                  </nav>
              </div>
              ';

    } else {
        echo '
              <div id="headerDiv">
                  <nav class="navbar navbar-expand-lg navbar-light">
                      <a class="navbar-brand" href="home.php"><i class="fas fa-paw"></i> LoveDog</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pricing.html"><i class="fas fa-tags"></i> Pricing</a>
                                </li>
                            </ul>
                            <span class="navbar-text" style="color: #fff;">
                                A man\'s best friend needs a best friend too!
                            </span>
                        </div>
                  </nav>
              </div>
              ';
    }
