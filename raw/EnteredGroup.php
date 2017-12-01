<?php

//the session_start() should always be at the top
session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};

if(!isset($_GET['group_id'])){
	header( 'Location: MobileGroupsTab.php' );
}

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

	print_r($_GET);

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
					echo "<p >XXXVALUE" . $x . "</p>";
					echo "<a href='EnteredGroup.php?group_id=" . $_GET['group_id'] ."&sample=1&page=1'>";
				} else {
					echo "<p >YYYVALUE" . $x . "</p>";
					echo "<a href='EnteredGroup.php?group_id=" . $_GET['group_id'] ."&sample=0&page=1'>";

				}

				echo "<p >XVALUE" . $x . "</p>";




			} else {
				$x = 1;
				echo "<a href='EnteredGroup.php?group_id=" . $_GET['group_id'] ."&sample=1&page=1'>";

			}

			/*
				if ($x === 0){

					echo "<p >VALUE 0</p>";

					echo $_GET['group_id'];
					//echo "<a href='EnteredGroup.php?group_id=". $_GET['group_id'] ."&page=".$_GET["page"]."'>".$i."&nbsp;&nbsp;&nbsp;</a>";
					echo "<a href='EnteredGroup.php?group_id=" . $_GET['group_id'] ."&sample=1&page=1'>";
					$x = 1;
				}

				else if ($x === 1){
					echo "<p >VALUE 1";
									echo "</p>";
					echo "<a href='EnteredGroup.php?group_id=" . $_GET['group_id'] ."&sample=0&page=1'>";
					$x = 0;
				}
			*/



			?>
                <div class="toggle-logo"> </div>
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

		<?php

		if(isset($_GET['group_id'])){
			//SELECT * FROM groups WHERE group_id = 44

			$query = "SELECT * FROM groups WHERE group_id = " . $_GET['group_id'];
			//echo $query;


			$result = mysqli_query($db, $query) or die('Error querying database.');

			$row = mysqli_fetch_array($result);

			////print_r($row)
		} else{

			echo "error no group is selected";
		}

		?>

    <div class="White_Area_Top">
			<div id="Entered_Top_Container">
				<div id="Entered_Groups_Profile_Pic">
					<?php
						if(empty($row['group_photo'] )){
						echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
					}
					else {
						echo "<td> <img src='" . $row['group_photo'] . "' class='circlePhotoUploaded'></td>";
					}
					?>
				</div>
				<div id="Entered_Top_Info">
					<div id="Top_Area_Title">
						<?php
							echo $row['group_title'];
						?>
					</div>
					<div id="Top_Area_Info">
						<?php
							echo $row['group_description'];
						?>
					</div>

				</div>

				<div id="Entered_Top_Button">

						<a href="MobileGroupsTab.php"><button id="Entered_Back">Back</button></a>

						<form action="Add_Song_To_Group.php" method="get">
							<input type="hidden" name="group_id" value="<?php echo $_GET['group_id']?>"/>
							<input id="Entered_Add_Music" type="submit" value="Add Songs"/>
						</form>

				</div>
			</div>
    </div>




        <div class="groups_inside_bottom_area">
			<div id="m-profile-main-inner">
				<div class="spaceContainerTop"><h1>Songs</h1></div>





				<?php
					if(isset($_GET['group_id'])){
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



						$limit = 5;
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
						$start_from = ($page-1) * $limit;

						$query = "SELECT * FROM music_group WHERE group_id = " . $_GET['group_id'] . " AND music = ". $music ." LIMIT "  . $limit . " OFFSET " . $start_from;
						//echo $query;


						$result = mysqli_query($db, $query) or die('Error querying database. ');

						$i=1;
						$desktop_num = 0;
						while ($row = mysqli_fetch_array($result)){

							echo "<div class='streaming'>";
							echo "<div class='first-song'>";
								echo "<div class='songpic'>";
									echo "<div class='songpicfade'>";
									echo "</div>";
									echo "<button  id='play_pause_feed' class='play_pause_feed_desktop' onClick='pauseAllWave(".$i."); '>";
									echo "<i class='glyphicon glyphicon-play'></i>";
									echo "</button>";
									if(empty($row['music_photo'] )){
										echo "<td> <img src='./SVG/EmptyPicture.svg' class='circlePhotoUploadedFeed' /> </td>";
									}
									else{
										echo "<td> <img src='" . $row['music_photo'] . "' class='circlePhotoUploadedFeed' /> </td>";
									}
								echo "</div>";

								echo "<div class='song-buttons'>";
									echo "<p id='FeedArtistsName'>First Name Last Name";
									echo "</p>";
								echo "</div>";
								echo "<div class='track-display'>";

									echo "<div id='waveform".$i."' class='wave'></div>";
										///echo "<div style='text-align: center' class='btn_play_pause'>";

										///echo "</div>";
									echo "</div>";

								echo "</div>";
								echo "<a href='/raw/raw/raw/". $row['music_file'] . "' download='" . $row['music_file'] . "'>";
								echo "<button class='download_feed_button'>";
								echo "Download";
								echo "</button>";
								echo "</a>";
									echo "<script>";
									echo "var wavesurfer".$i." = WaveSurfer.create({
											container: '#waveform".$i."',
											waveColor: '#c5ddff',
											progressColor: '#75a8ff',
											height:50,
											hideScrollbar:true,
											barWidth:5,
											responsive: true";
									echo "});";
									echo "wavesurfer".$i.".load('". $row['music_file'] ."');";
									echo "wavesurfer".$i.".on('pause', function () {
											pause_image_function(".$desktop_num.");
									 });
									 wavesurfer".$i.".on('finish', function () {
											pause_image_function(".$desktop_num.");
									 });
									 wavesurfer".$i.".on('play', function () {
											play_image_function(".$desktop_num.");
									 });";
									echo "</script>";
									$i++;
							echo "</div>";

							$desktop_num++;
						}

						////print_r($row)

						$querry = "SELECT COUNT(group_id) FROM music_group WHERE group_id = " . $_GET['group_id'] . " AND music = " . $music;
						$rs_result = mysqli_query($db, $querry);
						$row = mysqli_fetch_row($rs_result);
						$total_records = $row[0];
						$total_pages = ceil($total_records / $limit);
						$pagLink = "<div class='pagination'>";
							for ($i=1; $i<=$total_pages; $i++) {
								$pagLink .= "<a href='EnteredGroup.php?group_id=". $_GET['group_id'] ."&page=".$i."'>".$i."&nbsp;&nbsp;&nbsp;</a>";
							};
						echo $pagLink . "</div>";

					} else{

						echo "error no group is selected";
					}



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

			<div>

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
    <script src="categoriesmenu.js"></script>
	<!--<script src="UploadPhotos.js"></script>-->



</body>
<?php
	mysqli_close($db);
?>
</html>
