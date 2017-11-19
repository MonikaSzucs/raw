<?php

session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};

$target_file_photo = "";
$target_file_music = "";
$target_music_file = "";
$target_file = "";


//group picture
//the ifseet means this will only work when you click form submit
if( isset($_FILES["fileToUpload"]["name"]) && !empty($_FILES["fileToUpload"]["name"])) {
	$target_file = "GlobalPictures/".time().basename($_FILES["fileToUpload"]["name"]);
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
}
/*
if( isset($_FILES["myImage"]["name"]) && !empty($_FILES["myImage"]["name"])) {
	echo "1<br//>";
	$target_file_photo .= "GlobalPictures/".time().basename($_FILES["myImage"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file_photo,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["myImage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
		echo "1<br//>";
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	// Check if file already exists
	if (file_exists($target_file_photo)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["myImage"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["myImage"]["tmp_name"], $target_file_photo)) {
			echo "The file ". basename( $_FILES["myImage"]["name"]). " has been uploaded.";
		} else {
			$target_file_photo = "";
			echo "Sorry, there was an error uploading your photo file.";
		}
	}
}
*/
///music
if( isset($_FILES["userfile"]["name"]) && !empty($_FILES["userfile"]["name"])) {

	$target_music_file = "GlobalSongs/". time().basename($_FILES["userfile"]["name"]);
	$musicUploadOk = 1;
	$file_name = $_FILES['userfile']['name'];
    $temp_dir = $_FILES["userfile"]["tmp_name"];
    $ext_str = "mp3,mp4,wav";
	$ext = substr($file_name, strrpos($file_name, '.') + 1);
    $allowed_extensions=explode(',',$ext_str);
	$musicFileType = pathinfo($target_music_file,PATHINFO_EXTENSION);
	if($musicFileType == "mp3" || $musicFileType == "mp4" || $musicFileType == "wav"
	) {						
		$musicUploadOk = 1;
	} else {				
		$musicUploadOk = 0;
	}
	if ($_FILES["userfile"]["size"] > 50000000000) {
		echo "Sorry, your file is too large.";
		$musicUploadOk = 0;
	}
	if ($musicUploadOk == 0) {
		echo "Sorry, only MP3, MP4, WAV files are allowed.";
	} else{
		if (move_uploaded_file($temp_dir, $target_music_file)){
			echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
		}
		else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}


//music files
/*
if( isset($_FILES["myMusic"]["name"]) && !empty($_FILES["myMusic"]["name"])) {
	echo "1<br//>";
	$target_file_music .= "GlobalSongs/". time().basename($_FILES["myMusic"]["name"]);
	$uploadOk = 1;
	$valid_extension = array('.mp3', '.mp4', '.wav');
	$file_extension = strtolower( strrchr( $_FILES["myMusic"]["name"], "." ) );

	if( in_array( $file_extension, $valid_extension ) &&  $_FILES["myMusic"]["size"] < 50000000 ){
        $uploadOk = 1;
		echo "1<br//>";
    } else {
        echo "File is not an audio file.";
        $uploadOk = 0;
    }

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if(move_uploaded_file($_FILES["myMusic"]["tmp_name"], $target_file_music)){
			echo "The file " . basename( $_FILES["myMusic"]["name"]). " has been uploaded.";
		} else {
			$target_file_music = "";
			echo "Sorry, there was an error uploading your audio file.";
		}
	}
}
*/



$formErrorMessage = "";
$formSuccessfullMessage = "";

	//MySQLi Procedural


	if(isset($_POST['TitleSongSample'])){
		//Step1 connect to database
		define('DB_SERVER', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'raw');
		$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');



		$user_id= $_SESSION["user_id"];

		//add genre to the group
		$g_rnb = isset($_POST['g_rnb']) ?  $_POST['g_rnb'] :  "";
		$g_rock = isset($_POST['g_rock']) ?$_POST['g_rock'] : "";
		$g_pop = isset($_POST['g_pop']) ? $_POST['g_pop']: "";
		$g_punk = isset($_POST['g_punk']) ? $_POST['g_punk']: "";
		$g_jazz = isset($_POST['g_jazz']) ? $_POST['g_jazz']: "";
		$g_metal = isset($_POST['g_metal']) ?$_POST['g_metal']: "";
		$g_funk = isset($_POST['g_funk']) ? $_POST['g_funk']: "";
		$g_country = isset($_POST['g_country']) ? $_POST['g_country']: "";
		$g_edm = isset($_POST['g_edm']) ? $_POST['g_edm']: "";
		$g_classical = isset($_POST['g_classical']) ? $_POST['g_classical']: "";

		//add Moods to the group
		$g_happy = isset($_POST['g_happy']) ?  $_POST['g_happy'] :  "";
		$g_sad = isset($_POST['g_sad']) ?$_POST['g_sad'] : "";
		$g_angry = isset($_POST['g_angry']) ? $_POST['g_angry']: "";
		$g_chill = isset($_POST['g_chill']) ? $_POST['g_chill']: "";
		$g_focus = isset($_POST['g_focus']) ? $_POST['g_focus']: "";
		$g_workout = isset($_POST['g_workout']) ?$_POST['g_workout']: "";
		$g_travel = isset($_POST['g_travel']) ? $_POST['g_travel']: "";

		//add instruments to the group
		$g_guitar = isset($_POST['g_guitar']) ?  $_POST['g_guitar'] :  "";
		$g_bass = isset($_POST['g_bass']) ?$_POST['g_bass'] : "";
		$g_synth = isset($_POST['g_synth']) ? $_POST['g_synth']: "";
		$g_pads = isset($_POST['g_pads']) ? $_POST['g_pads']: "";
		$g_woodwind = isset($_POST['g_woodwind']) ? $_POST['g_woodwind']: "";
		$g_drums = isset($_POST['g_drums']) ?$_POST['g_drums']: "";
		$g_strings = isset($_POST['g_strings']) ? $_POST['g_strings']: "";
		$g_brass = isset($_POST['g_brass']) ? $_POST['g_brass']: "";


		if(isset($target_music_file))
		{
			//step 2 to make the SQL query
			$TitleSongSample = $_POST["TitleSongSample"];

			$query = "INSERT INTO music_public(user_id,  music_file, music, song_title, music_photo, g_rnb, g_rock, g_pop, g_punk, g_jazz, g_metal, g_funk, g_country, g_edm, g_classical, g_happy, g_sad, g_angry, g_chill, g_focus, g_workout, g_travel, g_guitar, g_bass, g_synth, g_pads, g_woodwind, g_drums, g_strings, g_brass) ";
			$query .= "VALUES ( '" . $_SESSION["user_id"] . "',  '" . $target_music_file . "', '" . $_POST['music_check']. "', '" . $TitleSongSample . "', '" . $target_file . "', '" . $g_rnb."' , '".$g_rock."', '".$g_pop."', '".$g_punk."', '".$g_jazz."', '".$g_metal."', '".$g_funk."', '".$g_country."', '".$g_edm."', '".$g_classical."', '".$g_happy."', '".$g_sad."', '".$g_angry."', '".$g_chill."', '".$g_focus."', '".$g_workout."', '".$g_travel."', '".$g_guitar."', '".$g_bass."', '".$g_synth."', '".$g_pads."', '".$g_woodwind."', '".$g_drums."', '".$g_strings."', '".$g_brass."') ";

			echo $query;
			//step 3
			if($result = mysqli_query($conn, $query) )
			{
				$formSuccessfullMessage .= ",music is added to group";
			}
			else{
				echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
		}


		//Step 4 Close the conenction
		mysqli_close($conn);


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


        <div class="Upload_Global_Main_Title">
			<div id="m-profile-inner">
				<div class="m-profile-buttons">

				</div>


				<div id="m-view-profile-div">
				<div class="spaceContainerTop"><h1>Add Songs/Samples</h1></div>



					<form action="EnteredGroup.php" method="get">
						<input type="hidden" name="user_id" value="<?php echo $_GET['user_id']?>"/>
					</form>
				</div>
			</div>
        </div>



        <div class="upload_page_music_global_white" id="upload_page_music_global_white">
			
			<div id="m-profile-main-inner">

			<div class="Profile-sub-container"> </div>
			<div class="TopSpace-ProfileGroupSub"></div>

			
					<div class="vertical-space"></div>



				<form id="contactForm" name="form" action="" method="post" enctype="multipart/form-data">
					<div class="ProfileIconGroups" id="list"></div>
						<span style='color:red; font-weight:bold'> <?php if(isset($formErrorMessage)){echo $formErrorMessage;} ?> </span>
						<span style='color:Green; font-weight:bold'> <?php if(isset($formSuccessfullMessage)){echo $formSuccessfullMessage;} ?> </span>

						<div class="UploadNewSongAreaTitle">
							<div class="GroupsInformation-Title">
								Title:<textarea maxlength="50" name="TitleSongSample" placeholder="Place your title here.."><?php if(isset($TitleSongSample)){echo $TitleSongSample; }?></textarea>
							</div>

						</div>
							
							<div class="upload_global_image_area">
								<div class="upload_page_global_titles">
									Upload a profile Image:
								</div>
								<!--<input class="file_upload_button" id="files" type="file" name="myImage" accept="image/x-png,image/gif,image/jpeg" /> -->
								<input class="file_upload_button" type="file" name="fileToUpload" id="files" accept="image/x-png,image/gif,image/jpeg"><br>
							</div>
							
							<div class="upload_global_song_area">
								<div class="upload_page_global_titles">
									Song or Samples Upload:
								</div>
								<!-- <input class="file_upload_button" id="files" type="file" name="myMusic" accept="audio/*" /> -->
								<input class="file_upload_button" type="file" class="form-control" name="userfile" id="userfile" accept="audio/*"/>
							</div>
							
							<div class="upload_global_radio_button_area">
								<div class="upload_page_global_titles">
									Is this a song or sample?
								</div>
								<div class="checkbox">
								  <label class="label_music_sample_global_upload"><input class="input_buttons_styles_music_global" type="radio" value="1" name="music_check" checked><span class="music_sample_label_music_global_uploading">Music</span></label>
								  <label class="label_music_sample_global_upload"><input class="input_buttons_styles_music_global" type="radio" value="0" name="music_check"><span class="music_sample_label_music_global_uploading">Sample</span></label>
								</div>
							</div>
							
							<div class="upload_global_genre_area">
								<span class='music_global_upload_title_style'>
									Genre(s)
								</span>

								<table style="left: 0;right: 0;margin: 20px 0 0 20px;">
									<tr>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_rnb" value="1"><span class="categories_label_music_global_uploading">RNB</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_rock" value="1"><span class="categories_label_music_global_uploading">Rock</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_pop" value="1"><span class="categories_label_music_global_uploading">Pop</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_punk" value="1"><span class="categories_label_music_global_uploading">Punk</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_jazz" value="1"><span class="categories_label_music_global_uploading">Jazz</span></td>
									</tr>
									<tr>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_metal" value="1"><span class="categories_label_music_global_uploading">Metal</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_funk" value="1"><span class="categories_label_music_global_uploading">Funk</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_country" value="1"><span class="categories_label_music_global_uploading">Country</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_edm" value="1"><span class="categories_label_music_global_uploading">EDM</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_classical" value="1"><span class="categories_label_music_global_uploading">Classical</span></td>
									</tr>
								</table>
							</div>
							
							<div class="upload_global_moods_area">
								<span class='music_global_upload_title_style'>
									Mood(s)
								</span>

								<table style="left: 0;right: 0;margin: 20px 0 0 20px;">
									<tr>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_happy" value="1"><span class="categories_label_music_global_uploading">Happy</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_sad" value="1"><span class="categories_label_music_global_uploading">Sad</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_angry" value="1"><span class="categories_label_music_global_uploading">Angry</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_chill" value="1"><span class="categories_label_music_global_uploading">Chill</span></td>
									</tr>
									<tr>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_focus" value="1"><span class="categories_label_music_global_uploading">Focus</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_workout" value="1"><span class="categories_label_music_global_uploading">Workout</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_travel" value="1"><span class="categories_label_music_global_uploading">Travel</span></td>
									</tr>
								</table>
							</div>
							
							<div class="upload_global_instruments_area">
								<span class='music_global_upload_title_style'>
									Instrument(s)
								</span>

								<table style="left: 0;right: 0;margin: 20px 0 0 20px;">
									<tr>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_guitar" value="1"><span class="categories_label_music_global_uploading">Guitar</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_bass" value="1"><span class="categories_label_music_global_uploading">Bass</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create"type="checkbox" name="g_synth" value="1"><span class="categories_label_music_global_uploading">Synth</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_pads" value="1"><span class="categories_label_music_global_uploading">Pads</span></td>
									</tr>
									<tr>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_woodwind" value="1"><span class="categories_label_music_global_uploading">Woodwind</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_drums" value="1"><span class="categories_label_music_global_uploading">Drums</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_strings" value="1"><span class="categories_label_music_global_uploading">Strings</span></td>
										<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_brass" value="1"><span class="categories_label_music_global_uploading">Brass</span></td>
									</tr>
								</table>
							</div>
						<div class="upload_global_submit_area">

								<input id="Create_music_global_upload_button" type="submit" />

						</div>
					</form>
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
