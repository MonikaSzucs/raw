<?php
//the session_start() should always be at the top

session_start();



   if( isset($_POST['email']) && isset($_POST['password']) ) {
		//Step1 connect to database
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'raw');
		$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

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
			//session_unset();
			$_SESSION["user_id"] = $rows['user_id'];
			$_SESSION["name"] = $rows['first_name'];
			header( 'Location: Streaming.php' ) ;
		}
		else
		{
			$message = "Wrong credential";
		}


		mysqli_close($db);

   }

/*
//connect to database
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "root");
    define("DB_DATABASE", "raw");

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  // you could test connection eventually using a if and else conditional statement,
  // feel free to take out the code below once you see Connected!
  if (isset($_POST['email']) && isset($_POST['password']) ) {
    echo "Connected!";
  } else {
    echo "Connection Failed";
  }
*/

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <link rel="stylesheet"  media="(min-width: 1024px)" href="D-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(min-width: 500px) and (max-width: 1024px)"  href="T-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(max-width: 500px)"  href="M-StartUpPage2.css?v=1">
    <script src = "index.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      #lottie {
        background-color: transparent;
        width: 100%;
        height: 80%;
        display: block;
        overflow: hidden;
        transform: translate3d(0,-60px,0);
        text-align: center;
        opacity: 1;
        position: absolute;
      }
    </style>

    </head>
    <body id="wrapper">
      <script src = "bodymovin.js" type="text/javascript"></script>
        <div id="Color">	</div>

		<div id="container">

<!--    RAW LOGO                                     -->


    <div id="lottie"></div>
    <script>
    // var params = {
    //   container: document.getElementById('lottie'),
    //   renderer: 'svg',
    //   loop: true,
    //   autoplay: true,
    //   path: 'JS/data.json'
    // };
    //
    // var anim;
    //
    // anim = bodymovin.loadAnimation(params);

    var anim = bodymovin.loadAnimation({
      container: document.getElementById('lottie'),
      renderer: 'svg',
      loop: true,
      autoplay: true,
      path: 'JS/data.json'
    })
  </script>


<!--    RAW LOGO                                     -->

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
                    <a href='forget.php' id="ForgotPassword" style="color:white; text-decoration:underline; left: 0; right: 0; margin: 0 auto; text-align: center; display: block; font-family: avenir; margin-top: 60px; text-decoration: none;">Forgot Password?</a> <br/>

					<button type="submit" form="SignIn1" value="Submit" id="LogInButton">Login</button>

					<a href='signup.php' id="SignUp" style="text-decoration: none;" >Sign up</a>
				</form>
		</div>

    </body>
</html>
