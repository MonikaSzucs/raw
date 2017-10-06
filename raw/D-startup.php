<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test</title>
        <link rel="stylesheet" href="D-StartUpPage.css">
		<link rel="stylesheet" href="T-StartUpPage.css">
		<link rel="stylesheet" href="M-StartUpPage2.css">
		<script src="script.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="wrapper">
        <div id="D-Color">	</div>
		
		<div id="D-container">
			<div id="logoIcon"></div>

			
			<div class="space"></div>
				
				<form action="" method="post" id="SignIn1">
					<div class="space2"></div>
					<div class="D-Titles">Email:</div>
					<input type="email" name="email" placeholder="E-mail" id="Email" style="text-indent:10px;" >
					<div class="space2"></div>
					<div class="D-Titles">Password:</div>
					<input type="password" name="password" placeholder="Password" style="text-indent:10px;" id="Password" >
                    <a href='forget.php' id="ForgotPassword" style="color:white; text-decoration:underline; left: 0; right: 0; margin: 0 auto; text-align: center; display: block;">Forgot Password?</a> <br/>
                    
					<br/>
					<button type="submit" form="SignIn1" value="Submit" id="LogInButton">Login</button>
					
					<a href='signup.php' id="SignUp" style="text-decoration: none;" >Sign up</a>
				</form>
        </div>
        

    </body>
</html>