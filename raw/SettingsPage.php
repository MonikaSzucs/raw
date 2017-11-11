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
</head>

<body>
    <header class="main-header">
        <nav>
            <div class="header">
                <div class="toggle-logo"> </div>
                <a href="MobileUploadPage.html">
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
    <div id="m-main-pagesettings" class="main-page">
        
                        
<!--
        hamburger menu
        
-->
        <div id="hamburger"> 
            <ul id="hambul">
                <a href="ProfileIntroPage.php"><li class="hamclass">
                Profile
                </li></a>  
                <a href="logout.php"><li class="hamclass">
                Sign Out
                </li></a>               
            </ul>
        </div>

        <h1 id="m-settings-h">Settings</h1>
		
		<p class="m-settings-info">Add Profile  Image</p>
		<input id="files" type="file" name="UserProfilePicture" accept="image/x-png,image/gif,image/jpeg" />

        <hr>
		<br/>
		<br/>
        <p class="m-settings-info">Email Address</p>

        <hr>

        <input id="m-email-input" type="text" name="email">

        <br//>
        <br//>
        <br/>
        <br/>

        <p class="m-settings-info">Password</p>
        <hr>
        <br/>
        <button id="m-reset-button">Send Password to Email</button>
        <br/>
        <br/>
        <br/>
        <br//>

        <p class="m-settings-info">Name</p>
        <hr>
        <br//>
        <p id="fname" class="m-settings-info">First Name</p>
        <input id="m-firstname" type="text" name="bday">
        <br/>
        <br/>
        <br/>
        <p id="lname"class="m-settings-info">Last Name</p>
        <input id="m-lastname" type="text" name="bday">

        <br/>
        <br/>
        <br/>
        <br//>
		<br/>
        

        <button id="m-save">SAVE</button>

        
    

        <div id="invisdiv3"></div>




    </div>

       


    <nav class="container">
        <a class="buttons" href="ProfileIntroPagevers2.html" tooltip="Profile"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.html" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.html" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.html" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.html" tooltip="Moods"></a><a class="buttons" href="#"><span><span class="rotate"></span></span></a></nav>

    <script src="cmenuscript.js"></script>

</body>

</html>
