<?php

//the session_start() should always be at the top
session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};

//	echo "session_user_id" . "<br/>" . $_SESSION["user_id"];

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
	
	if (isset($_POST['picture-button'])) {
		
		if( isset($_FILES["fileToUpload"]["name"]) && !empty($_FILES["fileToUpload"]["name"])) {
			$target_file = "ProfilePictures/".time().basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}

			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 50000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
					}
			}
			
			$query = "UPDATE user SET Profile_Picture='". $target_file ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
			$result = mysqli_query($db, $query) or die('Error querying database.');	
			
		}
			
	}


	
	
	
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
    <div class="settings_white" class="main-page">


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

        <h1 id="m-settings-h">Settings</h1>




		<!---
		//
		//
		Desktop view code below
		//
		//
		-->
			<div class="setting_profile_image">
				<form method='post' class='change_picture_form' enctype="multipart/form-data">
				<div class="m-profile-pic-intro_settings">
					<div class="ProfileIconGroups" id="list"></div>
				</div>
				<div class="m-profile-pic-intro_settings_change_image">
				
				
				
					<p class="m-settings-info">Change Profile  Image</p>
					<input id="files" class="m-settings-info_image_button" type="file" name="fileToUpload" accept="image/x-png,image/gif,image/jpeg" />
					<button name="picture-button" class="picture-input_button">Change Picture</button>
					</form>
				</div>
				
				

				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				<hr/>
				<br/><br/>

				<!--
				//
				//
				Email
				//
				//
				-->
				<div class="setting_change_area">
					<div class="email_area_settings">
						<br/>
						<?php
						if (isset($_POST['email-button'])) {
							$query = "UPDATE user SET email='". $_POST['email'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
							$result = mysqli_query($db, $query) or die('Error querying database.');
						}
						?>
						<span class="setting_title_items">Current Email Address:
						<?php
								$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
								$result = mysqli_query($db, $query) or die('Error querying database.');
								$row = mysqli_fetch_array($result);
								echo $row['email'];
							?>
						</span>

						<br/><br/>
						<span class="m-settings-info_sub_titles">Change Email Address: </span>
						<div class="m-settings-info_email_input_area">
							<form method='post' class='change_username_form'>
								<input id="email-input" type="text" name="email" placeholder="Type New Email Here">
								<button name="email-button" class="email-input_button">Change Email</button>
							</form>
						</div>
					</div>

					<hr/>
				<!--
				//
				//
				Password
				//
				//
				-->

					<div class="password_area_settings">
						<?php
							if (isset($_POST['password-button'])) {
								$query = "UPDATE user SET password='". $_POST['password'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
								$result = mysqli_query($db, $query) or die('Error querying database.');
							}
						?>
						<span class="setting_title_items">Current Password:
						<?php
								$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
								$result = mysqli_query($db, $query) or die('Error querying database.');
								$row = mysqli_fetch_array($result);

								echo $row['password'];
							?>
						</span>

						<br/><br/>
						<span class="m-settings-info_sub_titles">Change Password:</span>
						<div class="m-settings-info_password_input_area">
							<form method='post' class='change_username_form' >
								<input class="m-password-input" type="text" name="password" placeholder="Type New Password Here">
								<button name="password-button"  class="password-input_button">Change Password</button>
							</form>
						</div>
					</div>

					<hr/>

				<!--
				//
				//
				First Name
				//
				//
				-->
					<div class="first_name_area_settings">
						<?php
							if (isset($_POST['first-name-button'])) {
								$query = "UPDATE user SET first_name='". $_POST['first_name'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
								$result = mysqli_query($db, $query) or die('Error querying database.');
							}
						?>
						<span class="setting_title_items">Current First Name:
						<?php
							$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
							$result = mysqli_query($db, $query) or die('Error querying database.');
							$row = mysqli_fetch_array($result);
							echo $row['first_name'];
						?>
						</span>

						<br/><br/>
						<span class="m-settings-info_sub_titles">Change First Name:</span>
						<form method='post' class='change_username_form'>
							<input class="m-first_name-input" type="text" name="first_name" placeholder="Type New First Name Here">
							<button name="first-name-button" class="first_name-input_button">Change First Name</button>
						</form>
					</div>

					<hr/>

				<!--
				//
				//
				Last Name
				//
				//
				-->
					<div class="last_name_area_settings">
						<?php
							if(isset($_POST['last-name-button'])) {
								$query = "UPDATE user SET last_name='". $_POST['last_name'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
								$result = mysqli_query($db, $query) or die('Error querying database.');
							}
						?>
						<span class="setting_title_items">Current Last Name:
						<?php
							$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
							$result = mysqli_query($db, $query) or die('Error querying database.');
							$row = mysqli_fetch_array($result);
							echo $row['last_name'];
						?>
						</span>

						<br/><br/>
						<span class="m-settings-info_sub_titles">Change Last Name:</span>
						<form method='post' class='change_username_form'>
							<input class="m-last-name-input" type="text" name="last_name" placeholder="Type New Last Name Here">
							<button name="last-name-button" class="last_name-input_button">Change Last Name</button>
						</form>
					</div>

					<hr/>

				<!--
				//
				//
				User Name
				//
				//
				-->
					<div class="username_area_settings">
						<?php
							if (isset($_POST['username-button'])) {
								$query = "UPDATE user SET username='". $_POST['username'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
								$result = mysqli_query($db, $query) or die('Error querying database.');
							}
						?>
						<span class="setting_title_items">Current Username Name:
						<?php
							$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
							$result = mysqli_query($db, $query) or die('Error querying database.');
							$row = mysqli_fetch_array($result);
							echo $row['username'];
						?>
						</span>

						<br/><br/>
						<span class="m-settings-info_sub_titles">Change Username:</span>
						<form method='post' class='change_username_form'>
							<input class='m-username-input' type='text' name='username' placeholder='Type New Username Here'>
							<button name="username-button" class='username_input_button'>Change Username</button>
						</form>
					</div>

					<hr/>

				<!--
				//
				//
				Biography
				//
				//
				-->
					<div class="biography_area_settings">
						<?php
							if (isset($_POST['biography-button'])) {
								$query = "UPDATE user SET biography='". $_POST['biography'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
								$result = mysqli_query($db, $query) or die('Error querying database.');
							}
						?>
						<span class="setting_title_items">Current Biography:</br></span>
						<div class="biography_pulled">
						<?php
							$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
							$result = mysqli_query($db, $query) or die('Error querying database.');
							$row = mysqli_fetch_array($result);
							echo $row['biography'];
						?>
						</div>

						<br/>
						<span class="m-settings-info_sub_titles">Change Biography:</span>
						<form method='post' class='change_username_form'>
							<input class="m-biography-input" type="text" name="biography" placeholder="Type New Biography Here">
							<button  name="biography-button" class="biography-input_button">Change Biography</button>
						</form>
					</div>


					<hr/>

				<!--
				//
				//
				Hobbies
				//
				//
				-->
					<div class="hobbies_area_settings">
						<?php
							if (isset($_POST['hobbies-button'])) {
								$query = "UPDATE user SET hobbies='". $_POST['hobbies'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
								$result = mysqli_query($db, $query) or die('Error querying database.');
							}
						?>
						<span class="setting_title_items">Current Hobbies:</br></span>
						<div class="hobbies_pulled">
						<?php
							$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
							$result = mysqli_query($db, $query) or die('Error querying database.');
							$row = mysqli_fetch_array($result);
							echo $row['hobbies'];
						?>
						</div>

						<br/>
						<span class="m-settings-info_sub_titles">Change Hobbies:</span>
						<form method='post' class='change_username_form'>
							<input class="m-password-input" type="text" name="hobbies" placeholder="Type New Hobbie Here">
							<button name="hobbies-button" class="hobbies-input_button">Change Hobbies</button>
						</form>
					</div>

					<hr/>

				<!--
				//
				//
				Skills
				//
				//
				-->
					<div class="skills_area_settings">
						<?php
							if (isset($_POST['skills-button'])) {
								$query = "UPDATE user SET skills='". $_POST['skills'] ."' WHERE user_id='" . $_SESSION["user_id"] . "';";
								$result = mysqli_query($db, $query) or die('Error querying database.');
							}
						?>
						<span class="setting_title_items">Current Skills:</br></span>
						<div class="skills_pulled">
						<?php
							$query = "SELECT * FROM user WHERE user_id=" . $_SESSION["user_id"]. ";";
							$result = mysqli_query($db, $query) or die('Error querying database.');
							$row = mysqli_fetch_array($result);
							echo $row['skills'];
						?>
						</div>

						<br/>
						<span class="m-settings-info_sub_titles">Change Skills:</span>
						<form method='post' class='change_username_form'>
							<input class="m-password-input" type="text" name="skills" placeholder="Type New Skills Here">
							<button name="skills-button" class="skills-input_button">Change Skills</button>
						</form>
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
	<script src="UploadPhotos.js"></script>
<script src="categoriesmenu.js"></script>

</body>

</html>
