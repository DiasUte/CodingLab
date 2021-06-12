<!DOCTYPE html>

<?php
ob_start();
$dbc = mysqli_connect('localhost', 'root', '', 'qara') OR DIE('<p class="">Ошибка подключения к базе данных </p>');

if(isset($_POST['submitReg'])){
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

	if(!empty($username) && !empty($email) && !empty($password) && !empty($password2) && ($password == $password2)) {
		$query = "SELECT * FROM `users` WHERE name = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `users` (name, pass, email) VALUES ('$username','$password', '$email')";
			mysqli_query($dbc,$query);
      ob_end_flush();
			mysqli_close($dbc);
			header('Location: account.php');
		}
		else {
      ob_end_flush();
			header('Location: index.php');
		}
	 }
}

?>
<html>

<head>
    <title>Login/Register</title>
    <link rel="stylesheet" type="text/css" href="css/Login__Styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container3">
        <div class="main__image"><img src="img/imageLogin.svg" alt=""></div>
        <div class="main__header">
            <h1>REGISTRATION</h1>
        </div>
        <div class="input" action="registration.php">
            <div class="input__text1" action="registration.php">
                <form class="form" id="form" name="form" onsubmit="return myFunction()" method="post" action="registration.php">
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                        <span id="usernameerror" class="text-danger font-weight-bold" style="font-size:12px"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" title="Enter a valid mail please" />
                        <span id="emailerror" class="text-danger font-weight-bold " style="font-size:12px"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character(!@#$%^&)" />
                        <span id="passworderror" class="text-danger font-weight-bold" style="font-size:12px"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" id="password2" placeholder="Confirm password" class="form-control" 
                        style = "width:56.56vw;
	                            max-width: 575px;
	                            height: 34px;
	                            border-radius: 62px;
	                            position:  relative;
	                            margin: 0 auto;
	                            box-shadow: 0 0 10px rgba(0,0,0,0.25);
	                            border: 0px solid #707070;
	                            font-size: 20px;
	                            margin-bottom: 20px;">
                        <span id="password2error" class="text-danger font-weight-bold" style="font-size:12px"></span>
                    </div>
                    <button class="btn2" name = "submitReg"><p class = "btn__text">Send</p></button>

                    <script>
                        function myFunction() {

                            var username = document.getElementById('username').value;
                            var email = document.getElementById('email').value;
                            var password = document.getElementById('password').value;
                            var password2 = document.getElementById('password2').value;

                            var usernamecheck = /[A-Za-z]/;
                            var emailcheck = /[a-z0-9!#$%&'+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'+/=?^_`{|}~-]+)*@(gmail\.com|mail\.ru|list\.ru|inbox\.ru|bk\.ru|internet\.ru|yahoo\.com|yandex\.com|yandex\.ru)\b/;
                            var passwordcheck = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()+=-\?;,./{}|\":<>\[\]\\\' ~_]).{8,}/;
                            if (usernamecheck.test(username)) {
                                document.getElementById('usernameerror').innerHTML = " ";
                            } else {
                                document.getElementById('usernameerror').innerHTML = "<br>Введите Имя Пользователя на Латинице";
                                return false;
                            }

                            if (emailcheck.test(email)) {
                                document.getElementById('emailerror').innerHTML = " ";
                            } else {
                                document.getElementById('emailerror').innerHTML = "<br>Email должен содержать @gmail.com или другие.";
                                return false;
                            }

                            if (passwordcheck.test(password)) {
                                document.getElementById('passworderror').innerHTML = " ";
                            } else {
                                document.getElementById('passworderror').innerHTML = "<br>Миниму 8 символов, одно с большой буквой, одно с маленькой, одно число и один из специальных символов(!@#$%^&)";
                                return false;
                            }

                            if (password2.match(password)) {
                                document.getElementById('password2error').innerHTML = " ";
                            } else {
                                document.getElementById('password2error').innerHTML = "<br>Пароли не совпадают! Пожайлуста введите Заново.";
                                return false;
                            }
                            var completed = document.getElementsByClassName("form");
                            if (completed == "") {
                                return false;
                            } else {
                                alert("The form completed successfully!");
                                //window.open("index.php");
                            }
                        }
                    </script>
                </form>
            </div>
        </div>

    </div>
</body>

</html>