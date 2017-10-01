<?php 


//Step1 connect to database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'raw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

echo "<b>Connected successfully</b><br/>";

//Step2 get data from database
$query = "SELECT * FROM user";
$result = mysqli_query($db, $query) or die('Error querying database.');
//Step3 Display the result
while ($row = mysqli_fetch_array($result)) 
{
	echo $row['first_name'] . ' ' . $row['username'] . ' ' . $row['password'] . ' ' . $row['email'] .'<br />';
} 

//Step 4 close the connection
mysqli_close($db);
echo "<br/><br/><br/>";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Start Up</title>
        <link rel="stylesheet"  media="(min-width: 1024px)" href="D-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(min-width: 500px) and (max-width: 1024px)"  href="T-StartUpPage.css?v=1">
		<link rel="stylesheet"  media="(max-width: 500px)"  href="M-StartUpPage2.css?v=1">
		<script src="script.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="wrapper">
        <div id="Color">	</div>
		
		<div id="container">
			<div id="logoIcon"></div>

			
			<div class="space"></div>
			<h2> Home Page </h2>
        </div>
        
		
    </body>
</html>