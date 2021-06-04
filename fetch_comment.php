<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'qara') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');

	if (isset($_POST['movie_id'])) {
		$movie_id = $_POST['movie_id'];

		$answers = mysqli_query($dbc, "SELECT * FROM `comments` WHERE movie_id = '$movie_id' ORDER BY comment_id DESC");

		if (mysqli_num_rows($answers) > 0) {
			while($rowMessageExactForum=mysqli_fetch_assoc($answers)) {
				echo '
		<div class="eachAnswer">
			<p class="author-date">
				<i class="fas fa-user-circle" style="font-size:0.9rem;"></i>
				<span class="author"> '; echo $rowMessageExactForum['from_user']; echo ' </span>
				<span class="date">'; echo $rowMessageExactForum['date']; echo ' </span>
			</p>
			<p class="eachMessageForum">
				'; echo $rowMessageExactForum['message']; echo '
			</p>
		</div>';
			}
		}
		else {
			echo '
				<div class="noAnswer">
					<i class="fas fa-comment fa-2x"></i>
					<p>No Answers Yet</p>
					<p>Be the first to share what you think!</p>
				</div>
			';
		}
		ob_end_flush();
		mysqli_close($dbc);
	}
}
?>