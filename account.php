<!DOCTYPE html>
<html>
<head>
    <title>Account</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
            <div class="input__text1">
                <input type="text" placeholder="Enter your nickname" id="username" name="username" required class=".input1">
                <input type="password" placeholder="Enter your password" id="password" name = "password" class=".input1">
                <input type="password" placeholder="Confirm your password" id="re_password" name = "password2" class=".input1">
            </div>
        </div>
        <input type="submit" id="submitLog" name="submitLog" value="LOG IN" class="btn2"
		style = "font-family: Montserrat;
				color: rgb(255, 255, 255);
				font-weight: bold;
				font-size: 20px;" >
        <p class="form-error" id="form_error"></p>
    </div>
</body>
<script src="aos-master/dist/aos.js"></script>
	<script type="text/javascript">
  	$(document).ready(function() {
  		$('#submitLog').on('click', function() {
  			var username = $('#username').val();
  			var password = $('#password').val();
  			$.ajax({
  				method: "POST",
  				url: "checkUser.php",
  				data: { login: '1', username: username, password: password }
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
	</script>

</html>