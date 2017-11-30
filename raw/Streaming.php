<?php

//the session_start() should always be at the top
session_start();

//var_dump($_SESSION);

//echo "session_user_id" . "<br/>" . $_SESSION["user_id"];


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
	//print_r($_POST);


	$query = "INSERT INTO group_users (group_id, user_id)";
	$query .= " VALUES (" . $_POST['group_id'] . ", " . $_SESSION['user_id'] . ")";

	//echo $query;
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
	<script src="wave.js"></script>
</head>

<body>
    <header class="main-header">
        <nav>
            <div class="header">
			<?php 
			if(isset($_GET["sample"]) && $_GET['sample']==1)
			{
				echo '<a href="Streaming.php?sample=0">';
			}
			else{
				echo '<a href="Streaming.php?sample=1">';
			}
				
			?>		<div class="toggle-logo"> </div>
                </a>
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
                View Profile
                </li></a>
                <a href="GroupsCurrentlyIn.php"><li class="hamclass">
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
					
					<div>
				<?php
				
					


					//get group?_user from data base where user id equal to session user ID
					$query = "SELECT * 
								FROM group_users
								INNER JOIN groups on group_users.group_id = groups.group_id WHERE user_id = " . $_SESSION["user_id"];
					$result = mysqli_query($db, $query) or die('Error querying database.');
					$group_users = array();
					while ($row = mysqli_fetch_array($result)){
						$group_users[] = $row['group_id'];
					}

					//Step2 get data from database
					
					
					
					$query = "SELECT * 
								FROM group_users
								INNER JOIN groups on group_users.group_id = groups.group_id 
								WHERE user_id != " . $_SESSION["user_id"] . " ORDER BY created DESC LIMIT 5";
					$result = mysqli_query($db, $query) or die('Error querying database.');
				//Step3 Display the result


				while ($row = mysqli_fetch_array($result)) {
					echo "<div style='height: 30px; width: 100%;'></div>";

					//
					//
					//Large screen area
					//
					//
					echo "<div class='LargeScreenGroup'>";
						echo "<div class='group_container_create_streaming'>";
							echo "<div class='group_photo_Area_Streaming'>";
								if(empty($row['group_photo'] )){
									echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
								}
								else{
									echo "<td> <img src='" . $row['group_photo'] . "' class='circlePhotoUploadedStreaming' > </td>";
								}
								echo "</div>";
							echo "<div class='vertical_space_group_streaming'>";
								if (strlen($row['group_description'])>40){
									echo"<div class='groups_title_generate_streaming'>" . substr($row['group_title'],0,40) . "...";
								} else{
									echo"<div class='groups_title_generate_streaming'>" . $row['group_title'];
								}

								echo "</div>";
								echo "<div class='LeaveButtonGroups_streaming'>";

								$sql = "SELECT * FROM `group_users` WHERE user_id =" . $_SESSION["user_id"] . " AND group_id = " . $row['group_id'];

								$groupsshown = mysqli_query($db, $sql);
									//if(in_array($row['group_id'], $group_users))
									if(mysqli_num_rows($groupsshown) > 0)
									{
										//echo "already Joined";
										// DELETE FROM `group_users` WHERE `group_users`.`group_id` = 46 AND `group_users`.`user_id` = 1

										echo "<form action='' method='POST'>";
											echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
											echo "<input type='hidden' name='toDo' value='leave'>";
											echo "<input class='Leave-Butt' type='submit' value='Leave'>";
										echo "</form>";

									}
									else{
										echo "<form action='' method='POST'>";
											echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
											echo "<input type='hidden' name='toDo' value='join'>";
											echo "<input class='join-Butt_streaming' type='submit' value='join'>";
										echo "</form>";
									}

								echo "</div>";
								
								if(mysqli_num_rows($groupsshown) > 0)
									{
										echo "<div class='EnterButtonGroups'>";
											if(in_array($row['group_id'], $group_users)){
												echo "<form action ='EnteredGroup.php?sample=1' method='GET'>";
													echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
													echo "<input class='Enter-Butt' type='submit' value='Enter'>";
												echo "</form>";
											}
										echo "</div>";
									}
								echo "</div>";
							echo "</div>";
						echo "</div>";
					}
					

				?>
			</div>
			</div>
			</div>
			<!--
				   <div class="listeninghdiv_streaming"><h3 class="wtftext">Listening History</h3>
					 <p id="follname"> Name </p>
					 <p id="follname2"> Song Name </p>
						 <div class="followpic2"></div>
					</div>
					-->
					
				</div>
					<div class="invisdiv4"></div>
			</div>
			<?php

			
			
			
			
			//SELECT * FROM `music_public` ORDER BY music_uploaded DESC LIMIT 5;
			//Step2 get data from database
			$music=1;
			if(isset($_GET["sample"])){
				$sample = $_GET["sample"];
				if($sample == 1)
				{
					$music=0;
				}
				else{
					$music=1;
				}
			}
			$query = "SELECT * FROM music_public ";
			$query .= "WHERE music = ".$music." ";
			$query .= "ORDER BY music_uploaded DESC LIMIT 5;";
			$result = mysqli_query($db, $query) or die('Error querying database.');
			
			
			

			//Step3 Display the result

			$i=1;
			$desktop_num = 0;
			$tablet_num = 0;
			$mobile_num = 0;

			echo "<div class='Recently_Uploaded_Title'>Recently Uploaded</div>";
			echo "<div class='container_musics_feed'>";

			while ($row = mysqli_fetch_array($result)) {
					
				//names();
				
				
				//
				//Desktop Area
				//
						//echo "<p>".$k."</p>";



				echo "<div class='streaming'>";
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
                            echo "<p id='FeedArtistsName'>";
								$query2 = "SELECT first_name,last_name FROM user WHERE user_id=" . $row['user_id'];
								$names = mysqli_query($db, $query2) or die('Error querying database.');
								
								
									
									while ($Nrow = mysqli_fetch_array($names)) {
										 echo $Nrow['first_name'];
										 echo $Nrow['last_name'];
									}
							echo "</p>";
                            echo "<p id='FeedSongName'>" . $row['song_title'] . "</p>";
                        echo "</div>";
                        echo "<div class='track-display'>";

                            echo "<div id='waveform".$i."' class='wave'></div>";
                                // echo "<div>";
                                // echo "</div>";
                            echo "</div>";

                        echo "</div>";
						
						///Make sure you change this directory area when we configure it for when we host it
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
			};

			echo "</div>";

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
