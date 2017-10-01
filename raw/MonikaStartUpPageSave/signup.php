
<?php 
echo "<table>";
foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
}
echo "</table>";

if( isset($_POST['FnameNew']) && isset($_POST['UsernameNew']) && isset($_POST['EmailSUP']) && isset($_POST['PasswordNew']) ) {
	//Step1 connect to database
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'raw');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

	
	$FnameNew = $_POST['FnameNew'];
	$UsernameNew = $_POST['UsernameNew'];
	$EmailSUP = $_POST['EmailSUP'];
	$PasswordNew = $_POST['PasswordNew'];
	
	//if password is the same
	//if($PasswordNew === $PasswordNew2){}
	
	//repat step 2 and 3 for checkinbg that email does not exit in database
	$query = "SELECT * FROM user ";
	$query .=" where email='".$EmailSUP."' ";
	$result = mysqli_query($db, $query) or die('Error querying database.');
	$rows = mysqli_fetch_array($result);
	if(sizeof($rows)>0)
	{
		///Duplicate
		echo "Email has been taken already!";
	}
	else 
	{
		//to do
		//repat step 2 and 3 for checkinbg that username does not exit in database
		$query = "SELECT * FROM user ";
		$query .=" where username='".$UsernameNew."' ";
		$result = mysqli_query($db, $query) or die('Error querying database.');
		$rows = mysqli_fetch_array($result);
		if(sizeof($rows)>0)
			{
			///Duplicate
			echo "Username has been taken already!";
			}
		else{
			//step 2 Make the sql query
			//Query is needed to talk to database
			$query = "INSERT INTO `user` (`first_name`, `username`, `password`, `email`) ";
			$query .="VALUES ( '".$FnameNew."', '".$UsernameNew."', '".$PasswordNew."',  '".$EmailSUP."');";
			echo $query;
		

		// step 3 run the sql query
		$result = mysqli_query($db, $query) or die('Error querying database.');
		}
	}
	
	
			
	//Step 4 close the connection
	mysqli_close($db);
	echo "<br/><br/><br/>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet"  media="(min-width: 1024px)" href="D-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(min-width: 500px) and (max-width: 1024px)"  href="T-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(max-width: 500px)"  href="M-StartUpPage2.css?v=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="wrapper">
        <div id="Color">	</div>
		
		<div id="container">
			<div id="logoIcon"></div>

			
			<div class="space"></div>
				
				<form action="" method="post" id="SignUp1" name="SignUpForm">
                    <h3>Sign Up!</h3>
					<input type="text" name="FnameNew" placeholder="First Name" style="text-indent:10px;" id="FnameNew" required="required"> 
					<div class="space2"></div>
					<input type="text" name="UsernameNew" placeholder="Username" style="text-indent:10px;" id="UsernameNew" required="required">
					<div class="space2"></div>
					<input type="email" name="EmailSUP" placeholder="E-mail" id="EmailSUP" style="text-indent:10px;" id="EmailNew" required="required">
					<div class="space2"></div>
					<input type="password" name="PasswordNew" placeholder="Password" style="text-indent:10px;" id="PasswordNew" required="required">
					<div class="space2"></div>
					<input type="password" name="PasswordNew2" placeholder="Confirm Password" style="text-indent:10px;" id="PasswordNew2" required="required">
					<br/>
					<button form="SignUp1" value="Submit" id="SignUpButton">Sign Up</button>
                    <span>Already have an account?</span>
					<br/><br/>
                    <a href="index.php" id="BackLoginButton" style="text-decoration: none; padding-top: 5px; color:white">Back</a>
				</form>
				
        </div>
        
		
    </body>
	<script src="signup.js" type="text/javascript"></script>
</html>
