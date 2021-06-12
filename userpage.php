<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="css/userpage.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/Login__Styles.css">
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"> </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <header>
        <div class="container">
            <div class="header">
                <a href="index.php" class="logo" id="link_main" style = " font-size: 20px">Qara</a>
                <nav class="menu">
                    <a href="movie.php?id=1">Movies</a>
                    <a href="movie.php?id=2">Serials</a>
                    <a href="movie.php?id=3">Cartoons</a>
                    <a href="movie.php?id=4">TV Shows</a>
                </nav>
                <div class="menu__icon">
                    <a href="">Search</a>
                </div>
                <div class="toggle">
                  <i class="fas fa-moon toggle-icon"></i>
                  <i class="fas fa-sun toggle-icon"></i>
                  <div class="toggle-ball"></div>
              </div>
                <a href="javascript:openModal()" class="menu__reg">
                    <div class="menu__login">
                        <div class="menu__login__text">
                            <?php 
                            if(!isset($_COOKIE['username'])) {
                                echo "Sign in";
                            } else {
                                echo $_COOKIE['username'];
                            }?> 
                        </div>
                    </div>
                </a>    
            </div>
        </div>   
        <div class="prefix-Dialog" id="Modal">
          <div id="container_log">
              <div class="main__image"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/549af980-f98e-4b3f-9f9f-9f91292f5b5b/ddkn0y8-55cf4a4a-9b2d-4b98-a207-c68ddcb61606.png/v1/fill/w_1024,h_190,strp/marvel_studios_future_dream_logo_by_smashupmashups_ddkn0y8-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD0xOTAiLCJwYXRoIjoiXC9mXC81NDlhZjk4MC1mOThlLTRiM2YtOWY5Zi05ZjkxMjkyZjViNWJcL2Rka24weTgtNTVjZjRhNGEtOWIyZC00Yjk4LWEyMDctYzY4ZGRjYjYxNjA2LnBuZyIsIndpZHRoIjoiPD0xMDI0In1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.Yvv0lYqZDkMZIu0mcbh_kevK790s7wX9yB5_E0y6WoI" alt=""></div>
              <a href="registration.php" class="btn1">
                  <div class="btn__text">I am first time</div>
              </a>
              <a href="account.php" class="btn1">
                  <div class="btn__text">I have already account</div>
              </a>
              <a href="exit.php" class="btn1">
                  <div class="btn__text">Log Out</div>
              </a>
              <a class="prefix-close" title="Закрыть" href="#close"></a>
          </div>

      </div>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                <BR>
                <BR>
                <div class="author-card pb-3">
                    
                    <div class="author-card-profile">
                        <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="me">
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg">
                                <?php 
                            if(!isset($_COOKIE['username'])) {
                                echo "Sign in";
                            } else {
                                echo $_COOKIE['username'];
                            }?>
                             </h5>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush">
                        <a class="list-group-item" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Profile Settings</div>
                                </div><span class="badge badge-secondary">6</span>
                            </div>
                        </a>
                    </nav>
                </div>
            </div>
            <!-- Profile Settings-->
            <div class="col-lg-8 pb-5">
                <form class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-fn">First name</label>
                            <input class="form-control" type="text" id="account-fn" value="<?php 
                            if(!isset($_COOKIE['username'])) { // First name
                                echo "NULL First Name";
                            } else {
                                echo $_COOKIE['username'];
                            }?> " required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-ln">Last name</label>
                            <input class="form-control" type="text" id="account-ln" value="<?php 
                            if(!isset($_COOKIE['username'])) { // Last name
                                echo "NULL Last Name";
                            } else {
                                echo $_COOKIE['username'];
                            }?> " required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">Email</label>
                            <input class="form-control" type="email" id="account-email" value="<?php 
                            if(!isset($_COOKIE['email'])) {
                                echo "NULL Email";
                            } else {
                                echo $_COOKIE['email'];
                            }?> " required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-phone">Phone Number</label>
                            <input class="form-control" type="text" id="account-phone" value="+77777777" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-pass">New Password</label>
                            <input class="form-control" type="password" id="account-pass">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-confirm-pass">Confirm Password</label>
                            <input class="form-control" type="password" id="account-confirm-pass">
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox d-block">
                                <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                                <label class="custom-control-label" for="subscribe_me">Subscribe me to Newsletter</label>
                            </div>
                            <li>
                            <button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                            <br>
                            <button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly."><a href="exit.php">LOG OUT</a></button>
                            </li>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <BR>
    <BR>
    
<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>QARA</h6>
          <p> Here will be some amazing description </p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li><a href="http://scanfcode.com/category/c-language/">Movies</a></li>
            <li><a href="http://scanfcode.com/category/front-end-development/">Series</a></li>
            <li><a href="http://scanfcode.com/category/back-end-development/">Cartoons</a></li>
            <li><a href="http://scanfcode.com/category/java-programming-language/">TV Shows</a></li>
           
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="qara.kz">About Us</a></li>
            <li><a href="qara.kz">Contact Us</a></li>
           
            <li><a href="qara.kz">Privacy Policy</a></li>
            
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
       <a href="#">Umka and Dias</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="instagram" href="#"><img src = "https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_instagram-256.png"></a></li>
            <li><a class="facebook" href="#"><img src = "https://cdn3.iconfinder.com/data/icons/capsocial-round/500/facebook-256.png"></a></li>
            <li><a class="telegram" href="#"><img src = "https://cdn3.iconfinder.com/data/icons/popular-services-brands-vol-2/512/telegram-256.png"></a></li>
            <li><a class="vk" href="#"><img src = "https://cdn3.iconfinder.com/data/icons/capsocial-round/500/vk-256.png"></a></li>   
          </ul>
        </div>
      </div>
    </div>
</footer>

<script src="js/java.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
</body>
</html>