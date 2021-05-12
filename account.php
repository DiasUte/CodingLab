<!DOCTYPE html>
<?php
ob_start();
$dbc = mysqli_connect('localhost', 'root', '', 'qara') OR DIE('<p class="">Ошибка подключения к базе данных </p>');

if(!isset($_COOKIE['username'])) {
	if(isset($_POST['submitLog'])) {
		$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
		if(!empty($username) && !empty($password) && !empty($password2)  && ($password == $password2)) {
			$query = "SELECT `username` FROM `users` WHERE username = '$username' AND password = SHA('$password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('username', $row['username'], time() + (60*60*24*30));
				ob_end_flush();
        header('Location: index.html');
			}
			else {
				ob_end_flush();
        header('Location: registration.php');
			}
		}

	}
}

?>
<html>

<head>
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="css/Login__Styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container3">
        <div class="main__image"><img src="img/imageLogin.svg" alt=""></div>
        <div class="main__header">
            <h1>SIGN IN</h1>
        </div>
        <div class="input" >
            <form action="account.php" method="post"></form>
            <div class="input__text1">
                <input type="text" placeholder="Enter your E-mail" id="input_phone" name="username" required class=".input1">
                <input type="password" placeholder="Enter your password" id="input_phone" name = "password"class=".input1">
                <input type="password" placeholder="Confirm your password" id="input_phone"name = "password2" class=".input1">
            </div>
        </div>
        <a href="" name="submitLog" class="btn2">
            <div class="btn__text">ENTER</div>
        </a>
    </div>
</body>

</html>