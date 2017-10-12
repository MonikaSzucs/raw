<?php 
$target_file = "";

//group picture
if( isset($_FILES["myImage"]["name"])) {
	echo "1<br//>";
	$target_file .= "UserPictures/". basename($_FILES["myImage"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["myImage"]["size"] > 500000) {
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
		if (move_uploaded_file($_FILES["myImage"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["myImage"]["name"]). " has been uploaded.";
		} else {
			$target_file = "";
			echo "Sorry, there was an error uploading your file.";
		}
	}
}

//music files
if( isset($_FILES["myMusic"]["name"])) {
	echo "1<br//>";
	$target_file .= "UsersSongs/". basename($_FILES["myMusic"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["myMusic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an audio file - " . $check["mime"] . ".";
        $uploadOk = 1;
		echo "1<br//>";
    } else {
        echo "File is not an audio file.";
        $uploadOk = 0;
    }
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["myMusic"]["size"] > 500000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	if($imageFileType != "mp3" && $imageFileType != "aac" && $imageFileType != "wma"&& $imageFileType != "wav" ) {
		echo "Sorry, mp3, aac, wma, and wav files only.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["myMusic"]["tmp_name"], $target_file)) {
			echo "The file " . basename( $_FILES["myMusic"]["name"]). " has been uploaded.";
		} else {
			$target_file = "";
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
				$query = "INSERT INTO groups (group_title, group_description, group_photo, group_music_files) ";
				$query .= " VALUES ( '" . $TitleGroups . "', '" . $TextAreaGroups . "', '".$target_file."', '".$target_file."')";

				///echo $query;
			
				//Step 3 run the sql query
				if($result = mysqli_query($conn, $query)){
					if(sizeof($result)>0)
					{
						$group_id = mysqli_insert_id($conn);
						echo "the last primary key of group is : ". $group_id;
						
						$user_id=1;
						
						$query = "INSERT INTO group_user(group_id, user_id) ";
						$query .= "VALUES ( '" . $group_id . "', '" .  $user_id . "' ) ";
						
						if($result = mysqli_query($conn, $query) )
						{
							$formSuccessfullMessage = "Groups is created!";
						}
						else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
					}
				} 
				else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else{
			 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                <li class="hamclass">
                Profile
                </li>  
                <li class="hamclass">
                Sign Out
                </li>               
            </ul>
        </div>
        

        <div class="m-profile-box">
			<div id="m-profile-inner">
				<div class="m-profile-buttons">
					<ul id="m-list-buttons">
						<li>Sounds</li>
						<li>Info</li>
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
							
							<input id="files" type="file" name="myImage" accept="image/x-png,image/gif,image/jpeg" />
							<br/>
							<input id="files" type="file" name="myMusic" accept="audio/*" />
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
