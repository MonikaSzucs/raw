<?php 

if( isset($_POST['EmailForgot']) ) {
	//Step1 connect to database
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'raw');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

	echo "<b>Connected successfully</b><br/>";

	$EmailForgot = $_POST['EmailForgot'];

	//Step2 get data from database
	$query = "SELECT * FROM user ";
	$query .=" where email='".$EmailForgot."' ";

	$result = mysqli_query($db, $query) or die('Error querying database.');

	$rows = mysqli_fetch_array($result);
	if(sizeof($rows)>0)
	{
		$message = "Email sent" ;
		
		$db_selected = mysqli_select_db($db,$EmailForgot);
		$sql = "SELECT $EmailForgot FROM user";
		echo $db_selected;
		
	}
	else 
	{
		$message = "No Email Found";
	}
	//Step3 Display the result
	//while ($row = mysqli_fetch_array($result)) 
	///{
	///	echo $row['first_name'] . ' ' . $row['username'] . ' ' . $row['password'] . ' ' . $row['email'] .'<br />';
	//} 

	//Step 4 close the connection
	mysqli_close($db);
	echo "<br/><br/><br/>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
        <link rel="stylesheet"  media="(min-width: 1024px)" href="D-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(min-width: 500px) and (max-width: 1024px)"  href="T-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(max-width: 500px)"  href="M-StartUpPage2.css?v=1">
		<script src="forget.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="wrapper">
        <div id="Color">	</div>
		
		<div id="container">
			<div id="logoIcon"></div>

			
			<div class="space"></div>
			
		
                <form action="" method="post" id="ForgotPass">
                    <h3>Forgot Password?</h3>
					<?php if(isset($message)) { ?>
						<span id="xxx" style="color:red;"><?php echo $message; ?></span>
					<?php } ?>
					<br/>
					<input type="email" name="EmailForgot" placeholder="E-mail" id="EmailForgot" style="text-indent:10px;" required="required">
					<div class="space2"></div>
					<button type="submit" form="ForgotPass" value="Submit" id="ResetButton">Send Password</button>
                    <span>Already have an account?</span> 
					<br/>
					<br/>
                    <a href="index.php" id="BackLoginButton" style="text-decoration: none; padding-top: 5px; color:white">Login</a>
				</form>
				
				
            
                
        </div>
        
		
    </body>
</html>