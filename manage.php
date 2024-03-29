<?php
session_start();
if ( isset($_SESSION['username'])) {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Viewing Table of Score" />
		<meta name="keywords" content="HTML, CSS, PHP" />
		<meta name="author" content="Nelson, Minh, Tom, Joy, Uzi" />
		<title> Manage </title>
		<!-- Viewport set to scale 1.0 -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- References to external CSS files-->
		<link rel="stylesheet" href="styles/style.css">

		<!-- References to external fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<!-- Sigmar Once font -->
		<link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">
		<!-- Yanone Kaffeesatz font -->
		<link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Yanone+Kaffeesatz:wght@600&display=swap" rel="stylesheet">
		<!-- Roboto font-->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<!-- Exo font -->
		<link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

		<!-- References to external responsive CSS file -->
		<link rel="stylesheet" href="styles/responsive.css" media="screen and (max-width: 1024px)">
	</head>

	<body id="manage_body">
		<?php include 'header.inc'; ?>

		<article class="manage_container">
			<h1> Manager's Page </h1>
			
			<h2>Hello, <?php echo $_SESSION['name']; ?> </h2>
			

			<form action="display_all.php" method="post">
				<fieldset>
					<legend>Display STUDENT</legend>
					<input type="submit" name="display" value="display attempts" id="M_btn">
				</fieldset>
			</form>

			<form action="search_student.php" method="post">
				<fieldset>
					<legend>Search Student</legend>
					<input type="text" name="findstd" id="findstd" size ="30" placeholder="enter student id or name"> &nbsp;
					<br>
					<input type="submit" value="Find!" id="M_btn">
				</fieldset>
			</form>
			
			<form action="display_above.php" method="post">
				<fieldset>
					<legend>Display Students that Achieved 100% on their First Attempt</legend>
					<input type="submit" name="display" value="display attempts" id="M_btn">
				</fieldset>
			</form>

			<form action="display_below.php" method="post">
				<fieldset>
					<legend>Display Students that Achieve Below 50% on Second Attempt</legend>
					<input type="submit" name="display" value="display attempts" id="M_btn">
				</fieldset>
			</form>

			<form action="delete_for_student.php" method="post">
				<fieldset>
					<legend>Delete Attempt Record for Student</legend>
					<input type="text" name="del_atte" id="del_atte" placeholder="enter student id"> &nbsp;
					<br>
					<input type="submit" value="DELETE!" id="M_btn">
				</fieldset>
			</form>

			<form action="change_score.php" method="post">
				<fieldset>
					<legend>Change Score</legend>
					<input type="text" name="ch_score_sid" id="ch_score_sid" placeholder="enter student id">
					<br>
					<input type="text" name="ch_score_att" id="ch_score_att" placeholder="enter attempt number">
					<br>
					<input type="text" name="score_change" id="score_change" placeholder="enter new score">
					<br>
					<input type="submit" value="Change Score" id="M_btn">
				</fieldset>
			</form>

			<p class="logout_link"><a href="logout.php">Logout</a></p>

		</article>


		<?php include 'footer.inc'; ?>
	</body>

	</html>

<?php
} else {
	header("Location: loginform.php");
	exit();
}
?>