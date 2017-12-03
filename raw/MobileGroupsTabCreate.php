<?php

session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};
$target_file_song_pic = "";
$target_file_photo = "";
$target_file_music = "";
//print_r($_FILES);
//	echo "TTTTTTT<br//>";

//group picture
if( isset($_FILES["myImage"]["name"]) && !empty($_FILES["myImage"]["name"])) {
	echo "1<br//>";
	$target_file_photo .= "UserPictures/".time().basename($_FILES["myImage"]["name"]);
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

//song picture
if( isset($_FILES["myIndiv"]["name"]) && !empty($_FILES["myIndiv"]["name"])) {
	echo "1<br//>";
	$target_file_song_pic .= "UserPictures/2".time().basename($_FILES["myIndiv"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file_song_pic,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["myIndiv"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
		echo "1<br//>";
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	// Check if file already exists
	if (file_exists($target_file_song_pic)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["myIndiv"]["size"] > 5000000) {
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
		if (move_uploaded_file($_FILES["myIndiv"]["tmp_name"], $target_file_song_pic)) {
			echo "The file ". basename( $_FILES["myIndiv"]["name"]). " has been uploaded.";
		} else {
			$target_file_song_pic = "";
			echo "Sorry, there was an error uploading your photo file.";
		}
	}
}

//music files
if( isset($_FILES["myMusic"]["name"]) && !empty($_FILES["myMusic"]["name"])) {
	echo "1<br//>";
	$target_file_music .= "UsersSongs/". time().basename($_FILES["myMusic"]["name"]);
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



$formErrorMessage = "";
$formSuccessfullMessage = "";

	//MySQLi Procedural

	if(isset($_POST['TitleGroups'])){
		//Step1 connect to database
		define('DB_SERVER', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'raw');
		$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

		///$email = $_POST['email'];
		//$password = $_POST['password'];
		//step 2 to make the SQL query
		$TitleGroups = $_POST["TitleGroups"];
		$TextAreaGroups = $_POST["TextAreaGroups"];

		//step 2
		$query = "SELECT * FROM groups ";
		$query .= "WHERE group_title = '" . $TitleGroups . "' ";

		//step 3
		if($result = mysqli_query($conn, $query))
		{
			$rows = mysqli_fetch_array($result);

			//if the group title exist in database warn the user_error
			if(sizeof($rows)>0)
			{
				$formErrorMessage = "group title already taken!" ;

			}
			//else let them to create the record(insert)
			else{
				$query = "INSERT INTO groups (group_title, group_description, group_photo) ";
				$query .= " VALUES ( '" . $TitleGroups . "', '" . $TextAreaGroups . "', '".$target_file_photo."')";
				
			
				
				///echo $query;

				//Step 3 run the sql query
				if($result = mysqli_query($conn, $query)){
					if(sizeof($result)>0)
					{
						
						
						
						
						$formSuccessfullMessage = "Groups is created!";
						$group_id = mysqli_insert_id($conn);
						echo "the last primary key of group is : ". $group_id;

						$user_id= $_SESSION["user_id"];


						//add current user to the group
						$query = "INSERT INTO group_users(group_id, user_id) ";
						$query .= "VALUES ( '" . $group_id . "', '" .  $user_id . "' ) ";

						if($result = mysqli_query($conn, $query) )
						{
							$formSuccessfullMessage .= ",use is added to group";
						}
						else{
							echo "Error: " . $query . "<br>" . mysqli_error($conn);
						}

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


						if(isset($target_file_music))
						{
							$query = "INSERT INTO music_group(group_id, music_file, music, music_photo, g_rnb, g_rock, g_pop, g_punk, g_jazz, g_metal, g_funk, g_country, g_edm, g_classical, g_happy, g_sad, g_angry, g_chill, g_focus, g_workout, g_travel, g_guitar, g_bass, g_synth, g_pads, g_woodwind, g_drums, g_strings, g_brass) ";
							$query .= "VALUES ( '" . $group_id . "', '" .  $target_file_music . "', '" . $_POST['music_check']. "', '" . $target_file_song_pic . "', '" .$g_rnb."' , '".$g_rock."', '".$g_pop."', '".$g_punk."', '".$g_jazz."', '".$g_metal."', '".$g_funk."', '".$g_country."', '".$g_edm."', '".$g_classical."', '".$g_happy."', '".$g_sad."', '".$g_angry."', '".$g_chill."', '".$g_focus."', '".$g_workout."', '".$g_travel."', '".$g_guitar."', '".$g_bass."', '".$g_synth."', '".$g_pads."', '".$g_woodwind."', '".$g_drums."', '".$g_strings."', '".$g_brass."') ";

							if($result = mysqli_query($conn, $query) )
							{
								$formSuccessfullMessage .= ",music is added to group";
							}
							else{
								echo "Error: " . $query . "<br>" . mysqli_error($conn);
							}
						}
					}
				}
				else{
					echo "Error: " . $query . "<br>" . mysqli_error($conn);
				}
			}
		}
		else{
			 echo "Error: " . $query . "<br>" . mysqli_error($conn);
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
    <div class="m-ivisfoot"></div>
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




        <div class="create_group_white_container">
			<div id="m-profile-main-inner">
				<div class="spaceContainerTop"><h1>Create Group</h1></div>
				<a href="MobileGroupsTab.php"><button id="CreateGroupProfile">Back</button></a>
				<!--<div class="Profile-sub-container">

				</div>-->








					<form id="contactForm" name="form" action="" method="post" enctype="multipart/form-data">
						<div class="create_group_section_tnd">
							<div class="ProfileIconGroups" id="list"></div>
							<div class="vertical-space"></div>
							<span style='color:red; font-weight:bold'> <?php if(isset($formErrorMessage)){echo $formErrorMessage;} ?> </span>
							<span style='color:Green; font-weight:bold'> <?php if(isset($formSuccessfullMessage)){echo $formSuccessfullMessage;} ?> </span>


							<div class="GroupsInformation">
								<div class="GroupsInformation-Title">
									<span class="description_groups_create_text">
										Title:
									</span>
									<textarea maxlength="50" name="TitleGroups" placeholder="Place your title here.."><?php if(isset($TitleGroups)){echo $TitleGroups; }?></textarea>
								</div>
								<div class="horizontal-GroupSpace">
								</div>
								<div class="GroupsInformation-Description">
									<span class="description_groups_create_text">
										Description:
									</span>
									<textarea maxlength="500" name="TextAreaGroups" placeholder="Place your description here.."><?php if(isset($TextAreaGroups)){echo $TextAreaGroups; }?></textarea>

								</div>
							</div>
						</div>



							<!-- <div class="LargeScreenGroup">
							</div> -->

							<hr  />

							<div class="create_group_section_file">
								<span class='group_upload_title_style'>
									Upload a profile Image:
								</span>

								<input class="file_upload_button" id="files" type="file" name="myImage" accept="image/x-png,image/gif,image/jpeg"  />
							</div>

							<hr>
							
							<div class="create_group_section_file">
								<span class='group_upload_title_style'>
									Upload a Song or Sample Image Image:
								</span>

								<input class="file_upload_button" type="file" name="myIndiv" accept="image/x-png,image/gif,image/jpeg"  />
							</div>

							<hr>

							<div class = "create_group_section_file">

								<span class='group_upload_title_style'>
									Song or Samples Upload:
								</span>

								<input class="file_upload_button" id="files" type="file" name="myMusic" accept="audio/*" />
								<hr>
							</div>

							<div class = "create_group_section_ss">
								<span class='group_upload_title_style'>
									Is this a song or sample?
								</span>
								<div class = "checkbox">
									<label class="label_groups_music_sample"><input class="input_buttons_styles_groups_create" type="radio" value="1" name="music_check" checked><span class="music_sample_label_groups_uploading">Music</span></label>
									<label class="label_groups_music_sample"><input class="input_buttons_styles_groups_create" type="radio" value="0" name="music_check"><span class="music_sample_label_groups_uploading">Sample</span></label>
								</div>
							</div>
							<hr/>


							<div class = "create_group_section_cb">
								<span class='group_upload_title_style'>
									Genre(s)
								</span>

								<table style="left: 0; right: 0;" class = "cb_table">
									<tr>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_rnb" value="1"><span class="categories_label_groups_uploading">RNB</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_rock" value="1"><span class="categories_label_groups_uploading">Rock</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_pop" value="1"><span class="categories_label_groups_uploading">Pop</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_punk" value="1"><span class="categories_label_groups_uploading">Punk</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_jazz" value="1"><span class="categories_label_groups_uploading">Jazz</span></td>
									</tr>
									<tr>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_metal" value="1"><span class="categories_label_groups_uploading">Metal</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_funk" value="1"><span class="categories_label_groups_uploading">Funk</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_country" value="1"><span class="categories_label_groups_uploading">Country</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_edm" value="1"><span class="categories_label_groups_uploading">EDM</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_classical" value="1"><span class="categories_label_groups_uploading">Classical</span></td>
									</tr>
								</table>
							</div>

							<hr>

							<div class = "create_group_section_cb">
								<span class='group_upload_title_style'>
									Mood(s)
								</span>

								<table style="left: 0; right: 0;" class = "cb_table">
									<tr>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_happy" value="1"><span class="categories_label_groups_uploading">Happy</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_sad" value="1"><span class="categories_label_groups_uploading">Sad</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_angry" value="1"><span class="categories_label_groups_uploading">Angry</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_chill" value="1"><span class="categories_label_groups_uploading">Chill</span></td>
									</tr>
									<tr>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_focus" value="1"><span class="categories_label_groups_uploading">Focus</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_workout" value="1"><span class="categories_label_groups_uploading">Workout</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_travel" value="1"><span class="categories_label_groups_uploading">Travel</span></td>
									</tr>
								</table>
							</div>
							<hr>

							<div class = "create_group_section_cb">
								<span class='group_upload_title_style'>
									Instrument(s)
								</span>

								<table style="left: 0; right: 0;" class = "cb_table">
									<tr>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_guitar" value="1"><span class="categories_label_groups_uploading">Guitar</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_bass" value="1"><span class="categories_label_groups_uploading">Bass</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_synth" value="1"><span class="categories_label_groups_uploading">Synth</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_pads" value="1"><span class="categories_label_groups_uploading">Pads</span></td>
									</tr>
									<tr>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_woodwind" value="1"><span class="categories_label_groups_uploading">Woodwind</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_drums" value="1"><span class="categories_label_groups_uploading">Drums</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_strings" value="1"><span class="categories_label_groups_uploading">Strings</span></td>
										<td style="width: 135px;"><input class="input_checkbox_style_group_create" type="checkbox" name="g_brass" value="1"><span class="categories_label_groups_uploading">Brass</span></td>
									</tr>
								</table>
							</div>

							<hr>

						<div id="buttonAreaCreate_buttonSubmit">
							<input id="CreateGroupProfileSubmit" type="submit" />
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
    <script src="categoriesmenu.js"></script>



</body>

</html>
