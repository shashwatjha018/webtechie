<!DOCTYPE html>
<html>
<header>
	<title>Login - Sign Up</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

		* {
			box-sizing: border-box;
		}

		body {
			background: black;
			background-size: 100% 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			font-family: 'Montserrat', sans-serif;
			height: 100vh;
			margin: -20px 0 50px;
		}

		.navibar {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 10;
			height: 80px;
			background: black;
		}

		.menu {
			max-width: 72rem;
			width: 100%;
			height: 100%;
			margin: 10px auto;
			padding: 0 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			color: #fff;
		}

		.menu img {
			margin-top: 10px;
			margin-right: 20px;
			margin-bottom: 10px;
		}

		.namelogo {
			display: flex;
		}

		.logo {
			font-size: 1.8rem;
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 2px;
			line-height: 4rem;
			margin-top: 10px;
		}

		.logo span {
			font-size: 1.8rem;
			margin-left: 5px;
			color: #F5A7A7;
		}


		h1 {
			font-weight: bold;
			margin: 0;
			font-family: 'Times New Roman', Times, serif;
		}

		h2 {
			text-align: center;
			font-family: 'Times New Roman', Times, serif;
		}

		h3 {
			font-family: 'Times New Roman', Times, serif;
		}

		.topright {
			position: absolute;
			top: 30px;
			right: 35px;
			font-size: 30px;

		}

		.topleft {
			position: absolute;
			top: 30px;
			left: 35px;
			font-size: 30px;

		}


		.input-icons i {
			position: absolute;
		}

		.input-icons {
			width: 100%;
			margin-bottom: 10px;
		}

		.icon {
			padding: 16px;
			color: #F5A7A7;
			min-width: 50px;
			text-align: center;

		}

		.input-field {
			width: 100%;
			padding: 10px;
			text-align: center;
		}

		p {
			font-size: 18px;
			font-weight: 500;
			line-height: 20px;
			letter-spacing: 0.5px;
			margin: 20px 0 30px;
			font-family: Verdana, Geneva, Tahoma, sans-serif
		}

		span {
			font-size: 12px;
		}

		a {
			color: #333;
			font-size: 14px;
			text-decoration: none;
			margin: 15px 0;
		}

		button {
			border-radius: 20px;
			border: 2px solid black;
			background: black;
			color: #FFFFFF;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		button:active {
			transform: scale(0.95);
		}

		button:focus {
			outline: none;
		}

		button.ghost {
			background-color: white;
			border-color: #FFFFFF;
		}

		form {
			background-color: white;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		input {
			background-color: #eee;
			border: 2px solid #f0f0f0;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		.container {
			background-color: transparent;
			border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
				0 10px 10px rgba(0, 0, 0, 0.22);
			position: relative;
			overflow: hidden;
			width: 768px;
			max-width: 100%;
			min-height: 460px;
			top: 50px;
		}

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
		}

		.container.right-panel-active .sign-in-container {
			transform: translateX(100%);
		}

		.sign-up-container {
			left: 0;
			width: 50%;
			opacity: 0;
			z-index: 1;
		}

		.container.right-panel-active .sign-up-container {
			transform: translateX(100%);
			opacity: 1;
			z-index: 5;
			animation: show 0.6s;
		}

		@keyframes show {

			0%,
			49.99% {
				opacity: 0;
				z-index: 1;
			}

			50%,
			100% {
				opacity: 1;
				z-index: 5;
			}
		}

		.overlay-container {
			position: absolute;
			top: 0;
			left: 50%;
			width: 50%;
			height: 100%;
			overflow: hidden;
			transition: transform 0.6s ease-in-out;
			z-index: 100;
		}

		.container.right-panel-active .overlay-container {
			transform: translateX(-100%);
		}

		.overlay {
			background: #f5a7a7;
			background: -webkit-linear-gradient(to top right, #f5a7a7, #f5a7a7);

			background: rgb(245, 167, 167);
			background: linear-gradient(90deg, #f5a7a7 0%, #f5a7a7 100%);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 0 0;
			font-size: 20px;
			color: black;
			position: relative;
			left: -100%;
			height: 100%;
			width: 200%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.container.right-panel-active .overlay {
			transform: translateX(50%);
		}

		.overlay-panel {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 40px;
			text-align: center;
			top: 0;
			height: 100%;
			width: 50%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.overlay-left {
			transform: translateX(-20%);
		}

		.container.right-panel-active .overlay-left {
			transform: translateX(0);
		}

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.container.right-panel-active .overlay-right {
			transform: translateX(20%);
		}

		.social-container {
			margin: 20px 0;
		}

		.social-container a {
			border: 1px solid #DDDDDD;
			border-radius: 50%;
			display: inline-flex;
			justify-content: center;
			align-items: center;
			margin: 0 5px;
			height: 40px;
			width: 40px;
		}

		.input-icons.success input {
			border-color: #2ecc71;
		}

		.input-icons.error input {
			border-color: #e74c3c;
		}

		.input-icons small {
			visibility: hidden;
			color: #e74c3c;
		}

		.input-icons.error small {
			visibility: visible;
		}

		.input-icons.success input {
			border-color: #2ecc71;
		}

		.input-icons.error input {
			border-color: #e74c3c;
		}
	</style>

</header>

<body>
	<div class="navibar">
		<div class="menu">
			<div class="namelogo">
				<img src="images/logo.jpeg" alt="Web Techie" height="60px">
				<h3 class="logo">Web<span>Techie</span></h3>
			</div>
			<div class="hamburger-menu">
				<div class="bar"></div>
			</div>
		</div>
	</div>

	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="#" id="form">
				<!--Sign Up Form-->
				<a href="home.php">
					<i class="fa fa-times topright"></i></a>
				<h2>Start Learning<br>With Us</h2>
				<div class="input-icons col-md-4">
					<i class="fa fa-user icon"> </i>
					<input class="input-field" type="text" placeholder="Username" id="username">
					<small class = "su" id = "su-username">Error Msg</small>
				</div>
				<div class="input-icons" id="email-div">
					<i class="fa fa-envelope icon"> </i>
					<input class="input-field" type="text" placeholder="Email" id="email">
					<small class = "su" id = "su-email">Error Msg</small>
				</div>
				<div class="input-icons">
					<i class="fa fa-key icon"></i>
					<input class="input-field pass-key" type="password" placeholder="Password" id="password">
					<small class = "su" id = "su-password">Error Msg</small>

				</div>
				<button id="submit">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="#" id="form1">
				<!--Sign In Form-->
				<a href="home.php">
					<i class="fa fa-times topleft"></i></a>
				<h1>Sign In</h1>
				<h3>Please fill in the details to sign in to your account !</h3>
				<div class="input-icons" id="email1-div">
					<i class="fa fa-envelope icon"> </i>
					<input class="input-field" type="text" placeholder="Email" id="email1">
					<small class="si" id="si-email">Error Msg</small>
				</div>
				<div class="input-icons" id="pass1-div">
					<i class="fa fa-key icon"></i>
					<input class="input-field" type="password" placeholder="Password" id="password1">
					<small class="si" id="si-password">Error Msg</small>
					<span id="statusLogMsg"></span>
				</div>
				<a href="#">Forgot your password?</a>
				<button id="submit1">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn" style="color:black">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Guys!</h1>
					<p>Fasten your seat belts and get ready for an amazing journey With us !<br>
						Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp" style="color:black">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>
	<script src="js/ajaxrequest.js" type="text/javascript"></script>
</body>

</html>