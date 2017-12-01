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


?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="LargerScreens1024.css">
    <link rel="stylesheet" href="MediumScreen769And1023.css">
    <link rel="stylesheet" href="SmallScreen768version2.css">
    <link rel="stylesheet" href="SmallScreen768version2device.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
    $("#m-message-button").click(function(){
        $(".main-page").load("chatpage.html");
    });
});

</script>

</head>

<body>
    <header class="main-header">
        <nav>
            <div class="header">
                <div class="toggle-logo"> </div>
                <div class = "m-upload-button"></div>

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
    <div class="main-page">


<!--
        hamburger menu

-->
        <div id="hamburger">
            <ul id="hambul">
							<a href="ProfileIntroPage.php"><li class="hamclass">
											View Profile
											</li></a>
								<a href="UsersSounds.php"> <li class="hamclass">
							Profile
								 </li> </a>
                <a href="logout.php"><li class="hamclass">
                Sign Out
                </li></a>
            </ul>
        </div>

        <a href="UsersSounds.php"><div class="m-profile-box" >
            <div id="m-profile-pic-intro"></div>
            <div id="m-view-profile-div">
                <p id="name">

				<?php

					//get group?_user from data base where user id equal to session user ID
					$query = "SELECT * FROM user WHERE user_id =" . $_SESSION['user_id'];
					$result = mysqli_query($db, $query) or die('Error querying database.');

					$first_name = array();
					while ($row = mysqli_fetch_array($result)){
						$first_name[] = $row['first_name'];
					}

					echo $first_name[0];
				?>
				</p>
            <p id="view-profile">Profile</p>

            </div>
        </div>
        </a>
        <div class="m-settings-box">

            <div  class="m-center-text" id="m-message-button">
                Messages
                <div id="m-messicon" class="m-sicon"></div>
            </div>

            <div class="m-center-text" id="m-notifications-button">
                <a href="Notifications.php">Notifications</a>
                <div id="m-noticon" class="m-sicon"></div>
            </div>
			<div class="m-center-text" id="m-settings-button">
                <a href="GroupsCurrentlyIn.php">My Groups</a>
                <div id="m-seticon" class="m-sicon"></div>
            </div>
            <div class="m-center-text" id="m-settings-button">
                <a href="SettingsPage.php">Settings</a>
                <div id="m-seticon" class="m-sicon"></div>
            </div>

			<div style="height: 50px; width: 100%;"></div>

        </div>

        <div  class="m-center-text" id="m-signout-box">
			<a href="logout.php">
				Sign Out
			</a>
             <div id="m-signicon" class="m-sicon"></div>
        </div>

        <div id="invisdiv3"></div>

    </div>
   <nav class="container">
        <a class="buttons" href="ProfileIntroPage.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.php" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>
    <div class="cmenu"></div>

    <script src="cmenuscript.js"></script>




</body>

<?php
	//Step 4 close the connection
	mysqli_close($db);
	echo "<br/><br/><br/>";
	?>

</html>
