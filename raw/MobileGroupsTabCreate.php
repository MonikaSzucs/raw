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
print_r($_FILES);
	echo "TTTTTTT<br//>";
	
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
						
						//add music to the group
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
					
								
						if(isset($target_file_music))
						{
							$query = "INSERT INTO music_group(group_id, music_file, music, g_rnb, g_rock, g_pop, g_punk, g_jazz, g_metal, g_funk, g_country, g_edm, g_classical) ";
							$query .= "VALUES ( '" . $group_id . "', '" .  $target_file_music . "', '" . $_POST['music_check']. "', '".$g_rnb."' , '".$g_rock."', '".$g_pop."', '".$g_punk."', '".$g_jazz."', '".$g_metal."', '".$g_funk."', '".$g_country."', '".$g_edm."', '".$g_classical."') ";
							
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
              <a href="MobileExplorePage.php"><li>Explore</li></a>
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
						<li>Groups</li>
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
				<div class="spaceContainerTop"><h1>Create Group</h1></div>
				<a href="MobileGroupsTab.php"><button id="CreateGroupProfile">Back</button></a>
				<div class="Profile-sub-container">
					<div class="TopSpace-ProfileGroupSub"></div>
					<div class="ProfileIconGroups" id="list"></div>
					<div class="vertical-space"></div>
					<form id="contactForm" name="form" action="" method="post" enctype="multipart/form-data">
						<span style='color:red; font-weight:bold'> <?php if(isset($formErrorMessage)){echo $formErrorMessage;} ?> </span>
						<span style='color:Green; font-weight:bold'> <?php if(isset($formSuccessfullMessage)){echo $formSuccessfullMessage;} ?> </span>
						
						<div class="GroupsInformation">
							<div class="GroupsInformation-Title">
								Title:<br/>
								<textarea maxlength="50" name="TitleGroups"><?php if(isset($TitleGroups)){echo $TitleGroups; }?></textarea>
							</div>
							<div class="horizontal-GroupSpace">
							</div>
							<div class="GroupsInformation-Description">
								Description:<br/>
								<textarea maxlength="500" name="TextAreaGroups"><?php if(isset($TextAreaGroups)){echo $TextAreaGroups; }?></textarea>
								
							</div>	
						</div>
							<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
							Upload a profile Image:
							<br/>
							<input id="files" type="file" name="myImage" accept="image/x-png,image/gif,image/jpeg" />
							<br/><br/>
							Song or Samples Upload:
							<br/>
							<input id="files" type="file" name="myMusic" accept="audio/*" />
							<br/>
							Is this a song or sample?
							
							<div class="checkbox">
							  <label><input type="radio" value="1" name="music_check" checked>Music</label>
							  <label><input type="radio" value="0" name="music_check">Sample</label>
							</div>
							
							<div>
								<input type="checkbox" name="g_rnb" value="1">RNB<br>
								<input type="checkbox" name="g_rock" value="1">Rock<br>
								<input type="checkbox" name="g_pop" value="1">Pop<br>
								<input type="checkbox" name="g_punk" value="1">Punk<br>
								<input type="checkbox" name="g_jazz" value="1">Jazz<br>
								<input type="checkbox" name="g_metal" value="1">Metal<br>
								<input type="checkbox" name="g_funk" value="1">Funk<br>
								<input type="checkbox" name="g_country" value="1">Country<br>
								<input type="checkbox" name="g_edm" value="1">EDM<br>
								<input type="checkbox" name="g_classical" value="1">Classical<br>
							<div>
						
						<div id="buttonAreaCreate">
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



</body>

</html>
