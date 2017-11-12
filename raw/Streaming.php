<?php

//the session_start() should always be at the top
session_start();

var_dump($_SESSION);

echo "session_user_id" . "<br/>" . $_SESSION["user_id"];


if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};


//Step1 connect to database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'raw');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

if(isset($_POST['toDo'])){
	print_r($_POST);


	$query = "INSERT INTO group_users (group_id, user_id)";
	$query .= " VALUES (" . $_POST['group_id'] . ", " . $_SESSION['user_id'] . ")";

	echo $query;
	$result = mysqli_query($db, $query) or die('Error querying database.');

}

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
    <link rel="stylesheet" href="HomeDesktop.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/wavesurfer.min.js"></script>
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
    <div class="main-page">

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


		<div class="main-songDiv_feed">
			<div class='streaming_desktop'>
				<div class="feedsidebar">
					<div class="whotofollowdiv">  <h3 class="wtftext">Recent Groups Created</h3>
					<div class="personfollow">
						<p id="follname"> Name </p>
						 <button class="follbut">Join</button>
						<div class="followpic"></div>
						</div>
					</div>
				   <div class="listeninghdiv"><h3 class="wtftext">Listening History</h3>
					 <p id="follname"> Name </p>
					 <p id="follname2"> Song Name </p>
						 <div  class="followpic2"></div>
					</div>
				</div>
					<div class="invisdiv4"></div>
			</div>
			<?php

			//SELECT * FROM `music_public` ORDER BY music_uploaded DESC LIMIT 5;
			//Step2 get data from database
			$query = "SELECT * FROM music_public ORDER BY music_uploaded DESC LIMIT 5;";
			$result = mysqli_query($db, $query) or die('Error querying database.');

			//Step3 Display the result

			$i=1;
			$desktop_num = 0;
			$tablet_num = 0;
			$mobile_num = 0;

			echo 	"<div class='Recently_Uploaded_Title'>Recently Uploaded</div>";
			echo "<div class='container_musics_feed'>";

			while ($row = mysqli_fetch_array($result)) {


				//
				//Desktop Area
				//
						//echo "<p>".$k."</p>";


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
														echo "<button  id='play_pause_feed' class='play_pause_feed_desktop' onClick='wavesurfer".$i.".playPause(); play_pause_image_function(".$desktop_num.", 0)'>";
														echo "<i class='glyphicon glyphicon-play'></i";
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

                        echo "<button class='download_feed_button'>Download</button>";

                        echo "<script>";
                            echo "var wavesurfer".$i." = WaveSurfer.create({";
                                echo "container: '#waveform".$i."',";
                                echo "waveColor: '#c5ddff',";
                                echo "progressColor: '#75a8ff'";
                            echo "});";
                            echo "wavesurfer".$i.".load('". $row['music_file'] ."');";




							echo "</script>";
                        $i++;


                echo "</div>";

							//
							//
							//Tablet Area
							//

						echo "<div class='streaming_tablet'>";
		                    echo "<div class='first-song'>";
		                        echo "<div class='songpic'>";
		                            if(empty($row['music_photo'] )){
		                                echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
		                            }
		                            else{
		                                echo "<td> <img src='" . $row['music_photo'] . "' class='circlePhotoUploadedFeed' > </td>";
		                            }

										echo "<button  id='play_pause_feed' class='play_pause_feed_tablet' onClick='wavesurfer".$i.".playPause(); play_pause_image_function(".$tablet_num.", 1)'>";
										echo "<i class='glyphicon glyphicon-play'></i>";
										echo "</button>";
		                        echo "</div>";
		                        echo "<div class='song-buttons'>";
		                            echo "<p id='FeedArtistsName'>Name</p>";
		                            echo "<p id='FeedSongName'>" . $row['song_title'] . "</p>";
		                        echo "</div>";
		                        echo "<div class='track-display'>";

		                            echo "<div id='waveform".$i."' class='wave'></div>";
		                            echo "</div>";

		                        echo "</div>";

		                        echo "<button class='download_feed_button'>Download</button>";

		                        echo "<script>";
		                            echo "var wavesurfer".$i." = WaveSurfer.create({";
		                                echo "container: '#waveform".$i."',";
		                                echo "waveColor: '#c5ddff',";
		                                echo "progressColor: '#75a8ff'";
		                            echo "});";
		                            echo "wavesurfer".$i.".load('". $row['music_file'] ."');";
		                        echo "</script>";
		                        $i++;

		            echo "</div>";

									//
									//
									//Mobile Area
									//

								echo "<div class='streaming_mobile'>";
				                    echo "<div class='first-song'>";
				                        echo "<div class='songpic'>";
				                            if(empty($row['music_photo'] )){
				                                echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
				                            }
				                            else{
				                                echo "<td> <img src='" . $row['music_photo'] . "' class='circlePhotoUploadedFeed' > </td>";
				                            }
				                        echo "</div>";
				                        echo "<div class='song-buttons'>";
				                            echo "<p id='FeedArtistsName'>Name</p>";
				                            echo "<p id='FeedSongName'>" . $row['song_title'] . "</p>";
				                        echo "</div>";
				                        // echo "<div class='track-display'>";

				                            echo "<div id='waveform".$i."' class='wave'></div>";
				                                echo "<div>";
													echo "<button  id='play_pause_feed' class='play_pause_feed_mobile' onClick='wavesurfer".$i.".playPause(); play_pause_image_function(".$mobile_num.", 2)'>";
				                                        echo "<i class='glyphicon glyphicon-play'></i>";
				                                    echo "</button>";
				                                echo "</div>";
				                            echo "</div>";

				                        // echo "</div>";

				                        echo "<button class='download_feed_button'>Download</button>";

																echo "<div class='mobile_wave_hide'>";
					                        echo "<script>";
					                            echo "var wavesurfer".$i." = WaveSurfer.create({";
					                                echo "container: '#waveform".$i."',";
					                                echo "waveColor: '#c5ddff',";
					                                echo "progressColor: '#75a8ff'";
					                            echo "});";
					                            echo "wavesurfer".$i.".load('". $row['music_file'] ."');";
					                        echo "</script>";
																echo "</div>";
				                        $i++;
										$desktop_num++;
										$tablet_num++;
										$mobile_num++;
				            echo "</div>";



			};

			echo "</div>";


			echo "<script>";
				//echo "img[trackNum].style.backgroundImage = 'url(SVG/Play.svg)';";
				echo "var img = document.getElementsByClassName('play_pause_feed_desktop');";
				echo "var imgT = document.getElementsByClassName('play_pause_feed_tablet');";
				echo "var imgM = document.getElementsByClassName('play_pause_feed_mobile');";
				echo "console.log(img);";
				echo "var num = 'play';";
				echo"function play_pause_image_function(trackNum, version){";
							//echo "console.log('This is working');";
							echo "console.log(trackNum);";
							echo "console.log(version);";


							echo "if (num === 'play'){";
									echo "num = 'pause';";
									echo "console.log('Play');";
									echo "if (version === 0){";
										echo "img[trackNum].style.backgroundImage = 'url(SVG/Pause.svg)';";
									echo "}";
									echo "if (version === 1){";
										echo "imgT[trackNum].style.backgroundImage = 'url(SVG/Pause.svg)';";
									echo "}";
									echo "if (version === 2){";
										echo "imgM[trackNum].style.backgroundImage = 'url(SVG/Pause.svg)';";
									echo "}";

							echo "}";
							echo "else if(num === 'pause'){";
										echo "if (version === 0){";
										echo "img[trackNum].style.backgroundImage = 'url(SVG/Play.svg)';";
									echo "}";
									echo "if (version === 1){";
										echo "imgT[trackNum].style.backgroundImage = 'url(SVG/Play.svg)';";
									echo "}";
									echo "if (version === 2){";
										echo "imgM[trackNum].style.backgroundImage = 'url(SVG/Play.svg)';";
									echo "}";

									echo "num = 'play';";
									echo "console.log('Pause');";
							echo "}";
						echo "}";
			echo "</script>";
			?>

        </div>

    </div>

 <a class="buttons" href="ProfileIntroPagevers2.php" tooltip="Profile"></a>
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
