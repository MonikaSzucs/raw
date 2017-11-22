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
						echo "<td> <img src='" . $row['group_photo'] . "' class='circlePhotoUploaded' > </td>";
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

		
		

        <div class="White_Bottom_Area">
			<div id="m-profile-main-inner">
				<div class="spaceContainerTop"><h1>Songs</h1></div>
				<label class="switch">
				  <input type="checkbox">
				  
				</label>
				
				
	
				
				<?php
					if(isset($_GET['group_id'])){
						
						$limit = 5;
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
						$start_from = ($page-1) * $limit;
						
						$query = "SELECT * FROM music_group WHERE group_id = " . $_GET['group_id'] . " LIMIT "  . $limit . " OFFSET " . $start_from;;
						//echo $query;
						
						
						$result = mysqli_query($db, $query) or die('Error querying database. 78');
						
						$i=1;
						while ($row = mysqli_fetch_array($result)){
							
							echo "<div class='music_player'>";
							echo $row['music_file'] . "<br/>";
							
							echo "<div class='first-song'>";
								echo "<div class='songpic'></div>";
								echo "<div class='song-buttons'>";
									echo "<p id='FeedArtistsName'>Name</p>";
									echo "<p id='FeedSongName'>Track: </p>";
								echo "</div>";
								echo "<div class='track-display'>";
								
									echo "<div id='waveform".$i."' class='wave'></div>";
										echo "<div style='text-align: center' class='btn_play_pause'>";
										  echo "<button class='btn btn-primary' class='play_pause' onclick='wavesurfer".$i.".playPause()'>";
											echo "<i class='glyphicon glyphicon-play'></i>";
											echo "Play/Pause";
										  echo "</button>";
										echo "</div>";
									echo "</div>";
								
								echo "</div>";
								echo "<a href='/raw/raw/raw/". $row['music_file'] . "' download='" . $row['music_file'] . "'>";
								echo "<button id='DownloadButtonGroups'>";
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
									echo "</script>";
									$i++;
								echo "<br/><br/><br/><br/><br/><br/><br/>";
							echo "</div>";
						}
						
						////print_r($row)
						$querry = "SELECT COUNT(group_id) FROM music_group WHERE group_id = " . $_GET['group_id'];  
						$rs_result = mysqli_query($db, $querry);  
						$row = mysqli_fetch_row($rs_result);  
						$total_records = $row[0];  
						$total_pages = ceil($total_records / $limit);  
						$pagLink = "<div class='pagination'>";  
							for ($i=1; $i<=$total_pages; $i++) {  
								$pagLink .= "<a href='EnteredGroup.php?group_id=". $_GET['group_id'] ."& page=".$i."'>".$i."&nbsp;&nbsp;&nbsp;</a>";  
							};  
						echo $pagLink . "</div>"; 
						
					} else{
					
						echo "error no group is selected";
					}
					
					
				
				?>
				
				
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
	<script src="UploadPhotos.js"></script>
	


</body>
<?php
	mysqli_close($db);
?>
</html>
