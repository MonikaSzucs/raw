<?php

//the session_start() should always be at the top
session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};

	// echo "session_user_id" . "<br/>" . $_SESSION["user_id"];

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
             <li id="categories" onclick="myFunction2(this)">Categories</li>
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
    <div class="main-page" style = "background-color: white">


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
        
         <div id="hamburger2">
            <ul id="hambul2">
							<a href="MobileIGenresTemplate.php"><li class="hamclass">
								Genres
							</li></a>
							<a href="MobileMoodsTemplate.php"> <li class="hamclass">
								Moods
							</li> </a>
              <a href="MobileInsturmentsTemplate.php"><li class="hamclass">
                Instruments
              </li></a>
            </ul>
        </div>

        <a href="UsersSounds.php"><div class="m-profile-box-introphp" >
            <div id="m-profile-pic-introphp">
			
			<?php
			
			
			/*
			////Need to fix this area
			$query = "SELECT Profile_Picture FROM user WHERE user_id =" . $_SESSION['user_id'];
			$result = mysqli_query($db, $query) or die('Error querying database.');
			
			
			
			echo "<div class='personal_pic'>";
			echo $row['Profile_Picture'];
                if(empty($row['music_photo'] )){
					echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
                }
                else{
                   echo "<td> <img src='" . $row['music_photo'] . "' class='circlePhotoUploadedFeed' > </td>";
				}					
            echo "</div>";
			*/
			?>
			</div>
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

				<a href="GroupsCurrentlyIn.php">
					<div class="m-center-text" id="m-settings-button">My Groups
                <div id="m-groupicon" class="m-sicon"></div>
            </div>
				</a>

				<a href="SettingsPage.php">
            <div class="m-center-text" id="m-settings-button">Settings
                <div id="m-seticon" class="m-sicon"></div>
            </div>
				</a>

			<div style="height: 50px; width: 100%;"></div>

        </div>

				<a href="logout.php">
	        <div  class="m-center-text" id="m-signout-box">
					Sign Out
	             <div id="m-signicon" class="m-sicon"></div>
	        </div>
				</a>

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
     <script src="categoriesmenu.js"></script>




</body>

<?php
	//Step 4 close the connection
	mysqli_close($db);
	echo "<br/><br/><br/>";
	?>

</html>
