<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'qara') OR DIE('<p class="">Ошибка подключения к базе данных </p>');
	if(!isset($_COOKIE['username'])) {
		if (isset($_POST['login'])) {
			if(isset($_POST['username'])) {
				$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
				$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
				if(!empty($username) && !empty($password)) {
					$query = "SELECT `name` FROM `users` WHERE `name` = '$username' AND `pass` = '$password'";
					$data = mysqli_query($dbc,$query);
					if(mysqli_num_rows($data) == 1) {
						$row = mysqli_fetch_assoc($data);
						setcookie('username', $row['name'], time() + (60*60*24*30));
						ob_end_flush();
		        echo "1";
					}
					else {
						ob_end_flush();
		        echo "0";
					}
				}

			}
		}
    }
?>