<!doctype html>
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
			header('Location: registr.php');
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
    <meta charset="utf-8">
    <title>DiasOmirserik</title>
<link href="css/registr.css" type="text/css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
	
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="registr.php" method="post">
			<h1>Create Account</h1>
			<input type="text" name="username" id="username" placeholder="Username"/>
			<span id="usernameerror" class="text-danger font-weight-bold" style="font-size:12px"></span>
			<input type="email" id="email" name="email" placeholder="Email" class="form-control" title="Enter a valid mail please" />
			<span id="emailerror" class="text-danger font-weight-bold " style="font-size:12px"></span>
			<input type="password" name="password" id="password" placeholder="Password" class="form-control" title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character(!@#$%^&)" />
			<span id="passworderror" class="text-danger font-weight-bold" style="font-size:12px"></span>
			<input type="password" name="password2" id="password2" placeholder="Confirm password" class="form-control" />
			<span id="password2error" class="text-danger font-weight-bold" style="font-size:12px"></span>
			<button name = "submitReg" id = "submitReg">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="registr.php" method="post">
			<h1>Sign in</h1>
			
			
			<input type="text" placeholder="Enter your nickname" id="logusername" name="logusername" />
			<input type="password" placeholder="Enter your password" id="logpassword" name = "logpassword" />
			<a href="#">Forgot your password?</a>
			<button id="submitLog" id="submitLog" name="submitLog">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="aos-master/dist/aos.js"></script>
	<script type="text/javascript">
  	$(document).ready(function() {
  		$('#submitLog').on('click', function() {
  			var logusername = $('#logusername').val();
  			var logpassword = $('#logpassword').val();
  			$.ajax({
  				method: "POST",
  				url: "checkUser.php",
  				data: { login: '1', username: logusername, password: logpassword }
  			})
  				.done(function(result) {
  					if (result == "1") {
  						window.location.href = 'index.php';
  					} else if (result == "0"){
  						$('#form_error').html('Username or password is not correct');
                          
  					} else {
  						$('#form_error').html('ERROR. TRY AGAIN');
  					}
  				});
  		});
  	});

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});

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
</body>
</html>
