<?php
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'qara') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');

	if(!empty($_COOKIE['username'])) {
	  $username = $_COOKIE['username'];

		if (isset($_POST['submit'])) {
			$comment = mysqli_real_escape_string($dbc, trim($_POST['comment']));
			$date = date('Y-m-d');
            $movie_id = mysqli_real_escape_string($dbc, trim($_POST['movie_id']));
			$cat_name = mysqli_real_escape_string($dbc, trim($_POST['cat_name']));

			if(!empty($comment)) {
				$query ="INSERT INTO `comments`(author_user,comment,date,movie_id,cat_name) VALUES ('$username', '$comment', '$date','$movie_id','$cat_name')";
				mysqli_query($dbc,$query);
				ob_end_flush();
				mysqli_close($dbc);
				header("Location: moviePage.php?fir_id=$movie_id&sec_id=$cat_name");
				
			}

		}
	}


?>
