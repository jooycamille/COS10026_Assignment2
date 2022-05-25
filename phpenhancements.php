<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Viewing Table of Score" />
	<meta name="keywords" content="HTML, CSS, PHP" />
	<meta name="author" content="Nelson, Minh, Tom, Joy, Uzi" />
	<title> PHP Enhancement </title>
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

<body id="php_body">
	<?php include 'header.inc'; ?>

	<article class="php_container">
		<h1> PHP Enhancement's Page </h1>

		<!-- Need to create buttons for each query. Some buttons will need input fields (form) alongside them. -->
		<article class="e_container">
			<h1>Enhancements</h1>
			<section class="ex">
				<h4>Login Page</h4>
				<p>
					Providing a more secure Supervisor Page. <br>
					Only the admin and allowed users who has a login info can access the page. If the user has logout from the page, they are not allowed to access the page anymore. It will just keep redirecting them to the login page (loginform.php) <br>
					<br>
					<em><strong>Login credentials:</strong></em> <br>
					&nbsp; &nbsp;<strong>username: </strong> admin <br>
					&nbsp; &nbsp;<strong>password: </strong> 1234 <br>
					<br>
					<img src="images/phpenhancement.png" alt="php enhancement code">
				</p>
				<cite>https://www.simplilearn.com/tutorials/php-tutorial/php-login-form</cite>
				<ol class="examples">
					<li><a href="loginform.php">Login</a></li>
				</ol>
			</section>
			</section>
		</article>

	</article>

	<?php include 'footer.inc'; ?>
</body>

</html>