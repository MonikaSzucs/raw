<?php 


   if( isset($_POST['email']) && isset($_POST['password']) ) {
		//Step1 connect to database
		define('DB_SERVER', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'raw');
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

		$email = $_POST['email'];
		$password = $_POST['password'];

		//Step2 get data from database
		$query = "SELECT * FROM user ";
		//these two queries check to make sure it is in the database and if not you cant go through
		// the space after the last ' at the end of the line is important always have that space
		$query .=" where email='".$email."' ";
		$query .=" and password='".$password."' ";
		//echo $query;
		$result = mysqli_query($db, $query) or die('Error querying database.');
		$rows = mysqli_fetch_array($result);
		if(sizeof($rows)>0)
		{
			header( 'Location: home.php' ) ;
		}
		else 
		{
			$message = "Wrong credential";
		}
		mysqli_close($db);
		echo "<br/><br/><br/>";
		
   }



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <link rel="stylesheet"  media="(min-width: 1024px)" href="D-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(min-width: 500px) and (max-width: 1024px)"  href="T-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(max-width: 500px)"  href="M-StartUpPage2.css?v=1">
		<script src="index.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="wrapper">
        <div id="Color">	</div>
		
		<div id="container">
			<div id="logoIcon"></div>

			
			<div class="space"></div>
				
				<form action="" method="post" id="SignIn1">
					
					<h3>Sign In!</h3>
					<?php if(isset($message)) { ?>
					<span id="xxx" style="color:red;"><?php echo $message; ?></span>
					<?php } ?>
					<br/>
					
					<input type="email" name="email" placeholder="E-mail" id="Email" style="text-indent:10px;" >
					<div class="space2"></div>
					<input type="password" name="password" placeholder="Password" style="text-indent:10px;" id="Password" >
                    <a href='forget.php' id="ForgotPassword" style="color:white; text-decoration:underline; left: 0; right: 0; margin: 0 auto; text-align: center; display: block;">Forgot Password?</a> <br/>
                    
					<br/>
					<button type="submit" form="SignIn1" value="Submit" id="LogInButton">Login</button>
					
					<a href='signup.php' id="SignUp" style="text-decoration: none;" >Sign up</a>
				</form>
		</div>
       
    </body>
</html>