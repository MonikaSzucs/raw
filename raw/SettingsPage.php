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
    <div class="m-main-pagesettings_white" class="main-page">
        
                        
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
		
		<!---
		
		Mobile view code below
		
		-->
		
		<div class="setting_hide_mobile">
			<div class="setting_mobile_container">
				<div class="m-profile-pic-mobile_intro_settings"></div>
				
			
				
				
			</div>
		</div>
		
		
		<!---
		
		Desktop and Tablet view code below
		
		-->
		
		<div class="setting_hide_tablet_desktop">
			<div class="setting_profile_image">
				<div class="m-profile-pic-intro_settings"></div>
				<div class="m-profile-pic-intro_settings_change_image">
					<p class="m-settings-info">Change Profile  Image</p>
					<input id="files" class="m-settings-info_image_button" type="file" name="UserProfilePicture" accept="image/x-png,image/gif,image/jpeg" />
				</div>
				
				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				<hr/>
				<br/><br/>
				
				<div class="m-settings-info_Email_Area">
					<p class="m-settings-info">Current Email Address:</p>
					<p class="m-settings-info_sub_titles">Change Email Address: </p>
					
					<div class="m-settings-info_email_input_area">
						<input id="m-email-input" type="text" name="email" placeholder="Type New Email Here">
						<button class="m-email-input_button">Change Email</button>
					</div>
					
					<br/><br/><br/>
					<hr/>
					<br/>
				
					<div class="m-settings-info_password_input_area">
						<p class="m-settings-info_sub_titles">Change Password:</p>
						<input class="m-password-input" type="text" name="password" placeholder="Type New Password Here">
						<button class="m-password-input_button">Change Password</button>
					</div>
					
					<br/><br/>
					
					<div class="setting_break_mobile">
						<br/></br><br/></br><br/>
					</div>
					
					<hr/>
					<br/>
					
					<div>
						<p class="m-settings-info">Current First Name:</p>
						<p class="m-settings-info_sub_titles">Change First Name:</p>
						<input class="m-first_name-input" type="text" name="firstName" placeholder="Type New First Name Here">
						<button class="m-first_name-input_button">Change First Name</button>
					</div>
					
					<br/><br/>
					
					<div class="setting_break_mobile">
						<br/></br>
					</div>
					
					<hr/>
					<br/>
					
					<div>
						<p class="m-settings-info">Current Last Name:</p>
						<p class="m-settings-info_sub_titles">Change Last Name:</p>
						<input class="m-password-input" type="text" name="lastName" placeholder="Type New Last Name Here">
						<button class="m-password-input_button">Change Last Name</button>
					</div>
					
					<br/><br/>
					
					<div class="setting_break_mobile">
						<br/></br>
					</div>
					
					<hr/>
					<br/>
					
					<div>
						<p class="m-settings-info">Current Username Name:</p>
						<p class="m-settings-info_sub_titles">Change Username:</p>
						<input class="m-password-input" type="text" name="username" placeholder="Type New Username Here">
						<button class="m-password-input_button">Change Username</button>
					</div>
					
					<br/><br/>
					
					<div class="setting_break_mobile">
						<br/></br>
					</div>
					
					<hr/>
					<br/>
					
					<div>
						<p class="m-settings-info">Current Biography Name:</p>
						<p class="m-settings-info_sub_titles">Change Biography:</p>
						<input class="m-password-input" type="text" name="email" placeholder="Type New Biography Here">
						<button class="m-password-input_button">Change Biography</button>
					</div>
					
					<br/><br/>
					
					<div class="setting_break_mobile">
						<br/></br>
					</div>
					
					<hr/>
					<br/>
					
					<div>
						<p class="m-settings-info">Current Hobbies:</p>
						<p class="m-settings-info_sub_titles">Change Hobbies:</p>
						<input class="m-password-input" type="text" name="email" placeholder="Type New Hobbie Here">
						<button class="m-password-input_button">Change Hobbies</button>
					</div>
					
					<br/><br/>
					
					<div class="setting_break_mobile">
						<br/></br>
					</div>
					
					<hr/>
					<br/>
					
					<div>
						<p class="m-settings-info">Current Skills:</p>
						<p class="m-settings-info_sub_titles">Change Skills:</p>
						<input class="m-password-input" type="text" name="email" placeholder="Type New Skills Here">
						<button class="m-password-input_button">Change Skills</button>
					</div>
					
					</div>
				</div>
			</div>
		</div>
		
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
