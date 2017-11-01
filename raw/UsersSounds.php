<?php 

//the session_start() should always be at the top
session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy(); 
	header( 'Location: signout.php' ); 
};

	echo "session_user_id" . "<br/>" . $_SESSION["user_id"];

	/*
	if(!isset($_SESSION["user_id"]))
	{
		session_destroy(); 
		header( 'Location: signout.php' ); 
	};
	*/

	//Step1 connect to database
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'raw');

	$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

	if(isset($_POST['toDo'])){
		print_r($_POST);

		
		$query = "INSERT INTO group_users (group_id, user_id)";
		$query .= " VALUES (" . $_POST['group_id'] . ", " . $_SESSION['user_id'] . ")";
		
		echo $query;
		$result = mysqli_query($db, $query) or die('Error querying database.');

	}

	//SELECT * FROM `group_user` WHERE `user_id` = 1
	///I need to put a condition to make sure they aren't in that group already because if they are then don't show the join button.
	//then put the output in the array

	//mysqli_close($db);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="LargerScreens1024.css">
    <link rel="stylesheet" href="MediumScreen769And1023.css">
    <link rel="stylesheet" href="SmallScreen768version2.css">
    <link rel="stylesheet" href="SmallScreen768version2device.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <header class="main-header">
        <nav>
            <div class="header">
                <div class="toggle-logo"> </div>
                <a href="MobileUploadPage.php">
                    <div class="m-upload-button"></div>
                </a>

                <div id="hamb" onclick="myFunction(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>

           <ul class="nav-bar">
              <a href="Streaming.php"><li>Explore</li></a>
                <a href="MobileGroupsTab.php"><li>Groups</li></a>
                <a href="MobileIGenresTemplate.php"><li>Genres</li></a>
                <a href="MobileMoodsTemplate.php"><li>Moods</li></a>
                <a href="MobileInsturmentsTemplate.php"><li>Instruments</li></a>
            </ul>
            <div class="logo-spot"></div>

        </nav>
    </header>
    <div class="invisdiv"></div>


    <div class="track-player">
        <div id="last-button" class="m-player"></div>
        <div id="play-button" class="m-player"></div>
        <div id="next-button" class="m-player"></div>
    </div>
    <div class="m-ivisfoot"></div>
    <div class="main-page">
   
        <!--
        hamburger menu
        
-->
        <div id="hamburger"> 
            <ul id="hambul">
              <a href="ProfileIntroPage.php"> <li class="hamclass">
                Profile
                   </li> </a> 
                <a href="logout.php"><li class="hamclass">
                Sign Out
                </li></a>               
            </ul>
        </div>
        

        <div class="m-profile-box">
			<div id="m-profile-inner">
				<div class="m-profile-buttons">
					<ul id="m-list-buttons">
						<li>Sounds</li>
						<li><a href="UserInfo.php">Info</a></li>
						<li><a href="GroupsCurrentlyIn.php">Groups</a></li>
					</ul>
				</div>
				<div id="m-profile-pic-intro"></div>
				<div id="m-view-profile-div">
					<p id="name">Name</p>
					<ul id="view-profile">
						<li id="m-followers-list">
						</li>
					</ul>
				</div>
			</div>
        </div>

		
		

        <div class="m-profile-main">
			<div id="m-profile-main-inner">
				<div class="spaceContainerTop"><h1>User Sounds</h1></div>
				<label class="switch">
				  <input type="checkbox">
				  <span class="slider round"></span>
				</label>
					
					
				</div>
			</div>
			
			<div id="form_output">


			</div>
		</div>
    </div>
    <nav class="container">
        <a class="buttons" href="ProfileIntroPage.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.php" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>

    <script src="cmenuscript.js"></script>
	<script src="UploadPhotos.js"></script>



</body>

</html>
