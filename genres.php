<!doctype html>
<?php
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'qara') OR DIE('<p class="">Ошибка подключения к базе данных </p>');
if(isset($_GET['fir_id']) & isset($_GET['sec_id'])) {
  $cat_name = $_GET['sec_id'];
  $genre_id = $_GET['fir_id'];
	$movieInfo = mysqli_query($dbc, "SELECT * FROM `$cat_name` WHERE genre_id = '$genre_id'");
}
else {
  header('Location: index.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
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
                <a href="<?php 
                            if(!isset($_COOKIE['username'])) {
                                echo "javascript:openModal().php";
                            } else {
                                echo "userpage.php";
                            }?>" class="menu__reg">
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
    
<!-- SLIDER -->

<div class="tables">
    <ul>
    <?php
    while($movieRow = mysqli_fetch_assoc($movieInfo)){
   ?>
        <li>
            <div class="card card-1">
            <div class="card-content">
            <h6 class="card-title"><?php echo $movieRow['name'];?></h2>
            <p class="card-body">In this case it will be the small description of movie
            </p>
            <a href = "moviePage.php?fir_id=<?php echo $movieRow['id'];?>&sec_id=<?="$cat_name"?>" class="card-buttom">Let's go</a>
          </div>
          </div>
        </li>
        <?php 
    }
    ?>
    </ul>
</div>
  

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
            <li><a href="movie.php?id=1">Movies</a></li>
              <li><a href="movie.php?id=2">Series</a></li>
              <li><a href="movie.php?id=3">Cartoons</a></li>
              <li><a href="movie.php?id=4">TV Shows</a></li>
             
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
