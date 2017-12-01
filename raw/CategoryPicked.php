<?php

//the session_start() should always be at the top
session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};


	//echo "session_user_id" . "<br/>" . $_SESSION["user_id"];

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
		//print_r($_POST);


		$query = "INSERT INTO group_users (group_id, user_id)";
		$query .= " VALUES (" . $_POST['group_id'] . ", " . $_SESSION['user_id'] . ")";

		//echo $query;
		$result = mysqli_query($db, $query) or die('Error querying database.');

	};

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
	<script src="wave.js"></script>
</head>

<body>
    <header class="main-header">
        <nav>
            <div class="header">
				<?php

				if(isset($_GET["sample"]) )
				{
					//not default - whatever was set
					$x = $_GET["sample"];

					if ($x == 0){
						// echo "<p >XXXVALUE" . $x . "</p>";
						echo "<a href='CategoryPicked.php?mood=". $_GET['mood'] ."&sample=1&page=1'>";
					} else {
						echo "<p >YYYVALUE" . $x . "</p>";
						echo "<a href='CategoryPicked.php?mood=". $_GET['mood'] ."&sample=0&page=1'>";

					}

					// echo "<p >XVALUE" . $x . "</p>";




				} else {
					$x = 1;
					echo "<a href='CategoryPicked.php?mood=". $_GET['mood'] ."&sample=1&page=1'>";

				}
				?>

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
        
        <div class="categoryPickedArea_desktop">

	<?php

	$music=1;
	if(isset($_GET["sample"])){
		$sample = $_GET["sample"];
		//console.log($sample);
		if($sample == 1)
		{
			$music=0;
			//echo "SAMPLE LINK WORKS";
		}
		else{
			$music=1;
		}
	}



	//get group?_user from data base where user id equal to session user ID
	$query = "SELECT * FROM music_public WHERE user_id =" . $_SESSION['user_id'];
	$result = mysqli_query($db, $query) or die('Error querying database.');

	$i=1;
	$desktop_num = 0;
	$tablet_num = 0;
	$mobile_num = 0;

	$group_users = array();
	while ($row = mysqli_fetch_array($result)){
		$group_users[] = $row['music_public_id'];
	}

	//echo  $_GET['mood'];

	echo "<div class='spaceContainerTop'><p>";
		if($_GET['mood'] === 'g_rock'){
			echo "Rock";
		}
		else if($_GET['mood'] === 'g_rnb'){
			echo "RNB";
		}
		else if($_GET['mood'] === 'g_pop'){
			echo "Pop";
		}
		else if($_GET['mood'] === 'g_punk'){
			echo "Punk";
		}
		else if($_GET['mood'] === 'g_jazz'){
			echo "Jazz";
		}
		else if($_GET['mood'] === 'g_metal'){
			echo "Metal";
		}
		else if($_GET['mood'] === 'g_funk'){
			echo "Funk";
		}
		else if($_GET['mood'] === 'g_country'){
			echo "Country";
		}
		else if($_GET['mood'] === 'g_edm'){
			echo "EDM";
		}
		else if($_GET['mood'] === 'g_classical'){
			echo "Classical";
		}
		else if($_GET['mood'] === 'g_happy'){
			echo "Happy";
		}
		else if($_GET['mood'] === 'g_sad'){
			echo "Sad";
		}
		else if($_GET['mood'] === 'g_angry'){
			echo "Angry";
		}
		else if($_GET['mood'] === 'g_chill'){
			echo "Chill";
		}
		else if($_GET['mood'] === 'g_focus'){
			echo "Focus";
		}
		else if($_GET['mood'] === 'g_workout'){
			echo "Workout";
		}
		else if($_GET['mood'] === 'g_travel'){
			echo "Travel";
		}
		else if($_GET['mood'] === 'g_guitar'){
			echo "Guitar";
		}
		else if($_GET['mood'] === 'g_bass'){
			echo "Bass";
		}
		else if($_GET['mood'] === 'g_synth'){
			echo "Synth";
		}
		else if($_GET['mood'] === 'g_pads'){
			echo "Pads";
		}
		else if($_GET['mood'] === 'g_woodwind'){
			echo "Woodwind";
		}
		else if($_GET['mood'] === 'g_drums'){
			echo "Drums";
		}
		else if($_GET['mood'] === 'g_strings'){
			echo "Strings";
		}
		else if($_GET['mood'] === 'g_brass'){
			echo "Brass";
		}

	echo"</p></div>";

	//Step2 get data from database
	$limit = 5;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * $limit;

	$query = "SELECT * FROM music_public WHERE " . $_GET['mood'] . " = 1 AND music = ". $music ." LIMIT " . $limit  . " OFFSET " . $start_from;
	//$query = "SELECT * FROM groups";
	$result = mysqli_query($db, $query) or die('Error querying database.');
//Step3 Display the result


while ($row = mysqli_fetch_array($result))
{

				echo "<div class='streaming_desktop'>";
                    echo "<div class='first-song'>";
                        echo "<div class='songpic'>";
                            if(empty($row['music_photo'] )){
                                echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
                            }
                            else{
                                echo "<td> <img src='" . $row['music_photo'] . "' class='circlePhotoUploadedFeed' > </td>";
                            }
								echo "<div class='songpicfade'>";
								echo "</div>";
								echo "<button  id='play_pause_feed' class='play_pause_feed_desktop' onClick='pauseAllWave(".$i."); '>";
								echo "<i class='glyphicon glyphicon-play'></i>";
								echo "</button>";
                        echo "</div>";
                        echo "<div class='song-buttons'>";
                            echo "<p id='FeedArtistsName'>Name</p>";
                            echo "<p id='FeedSongName'>" . $row['song_title'] . "</p>";
                        echo "</div>";
                        echo "<div class='track-display'>";

                            echo "<div id='waveform".$i."' class='wave'></div>";
                                // echo "<div>";
                                // echo "</div>";
                            echo "</div>";

                        echo "</div>";
							echo "<a href='/raw/raw/raw/". $row['music_file'] . "' download='" . $row['music_file'] . "'>";
								echo "<button class='download_feed_button'>Download</button>";
							echo "</a>";

                        echo "<script>
                            var wavesurfer".$i." = WaveSurfer.create({
                                container: '#waveform".$i."',
                                waveColor: '#c5ddff',
                                progressColor: '#75a8ff',
								height:50,
								hideScrollbar:true,
								barWidth:5,
								responsive: true
                            });
                            wavesurfer".$i.".load('". $row['music_file'] ."');
							 wavesurfer".$i.".on('pause', function () {
									pause_image_function(".$desktop_num.");
							 });
							 wavesurfer".$i.".on('finish', function () {
									pause_image_function(".$desktop_num.");
							 });
							 wavesurfer".$i.".on('play', function () {
									play_image_function(".$desktop_num.");
							 });
						</script>";
						$i++;
                echo "</div>";

				$desktop_num++;


}

				$querry = "SELECT COUNT(" . $_GET['mood'] . ") FROM music_public WHERE " . $_GET['mood'] . " = 1;";
				$rs_result = mysqli_query($db, $querry);
				$row = mysqli_fetch_row($rs_result);
				$total_records = $row[0];
				$total_pages = ceil($total_records / $limit);
				$pagLink = "<div class='pagination'>";
				for ($i=1; $i<=$total_pages; $i++) {
					$pagLink .= "<a href='CategoryPicked.php?mood=". $_GET['mood'] ."&page=".$i."'>".$i."&nbsp;&nbsp;&nbsp;</a>";
				};
				echo $pagLink . "</div>";

	?>

		<script>
			var img = document.getElementsByClassName('play_pause_feed_desktop');

				function pause_image_function(trackNum){
					console.log('pause_image_function:'+trackNum);
					img[trackNum].style.backgroundImage = 'url(SVG/Play.svg)';
				}
				function play_image_function(trackNum){
					console.log('play_image_function:'+trackNum);
					img[trackNum].style.backgroundImage = 'url(SVG/Pause.svg)';
				}
				function pauseAllWave(i){
					console.log('pauseAllWave:'+i);
					console.log('i:'+i);
					if( i === 1){
						//play_pause_image_function(0);
						wavesurfer1.playPause();
						wavesurfer2.pause();
						wavesurfer3.pause();
						wavesurfer4.pause();
						wavesurfer5.pause();
					}
					else if( i === 2){
						//play_pause_image_function(1);
						wavesurfer2.playPause();
						wavesurfer1.pause();
						wavesurfer3.pause();
						wavesurfer4.pause();
						wavesurfer5.pause();
					}
					else if( i === 3){
						//play_pause_image_function(2);
						wavesurfer3.playPause();
						wavesurfer1.pause();
						wavesurfer2.pause();
						wavesurfer4.pause();
						wavesurfer5.pause();
					}
					else if( i === 4){
						///play_pause_image_function(3);
						wavesurfer4.playPause();
						wavesurfer1.pause();
						wavesurfer2.pause();
						wavesurfer3.pause();
						wavesurfer5.pause();
					}
					else if( i === 5){
						///play_pause_image_function(4);
						wavesurfer5.playPause();
						wavesurfer1.pause();
						wavesurfer2.pause();
						wavesurfer3.pause();
						wavesurfer4.pause();
					}
				}

			</script>

	</div>

    </div>
    <nav class="container">

			<a class="buttons" href="ProfileIntroPagevers2.php" tooltip="Profile"></a>
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
