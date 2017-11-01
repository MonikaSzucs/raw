<?php 

session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy(); 
	header( 'Location: signout.php' ); 
};

//Step1 connect to database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'raw');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');


//Step 4 Close the conenction
mysqli_close($conn);
		
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="LargerScreens1024.css">
    <link rel="stylesheet" href="MediumScreen769And1023.css">
    <link rel="stylesheet" href="SmallScreen768version2.css">
    <link rel="stylesheet" href="HomeDesktop.css">
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
                 <a href="ProfileIntroPage.php"> <li class="hamclass">
                Profile
                   </li> </a> 
                <a href="logout.php"><li class="hamclass">
                Sign Out
                </li></a>               
            </ul>
        </div>
        <h1 id="m-genresh">Instruments</h1>
        
    
        <div class="row1">
            <div id="m-guitar" class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Guitar</p>
				</a>
            </div>
            <div id="m-bass" class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Bass</p>
				</a>
            </div>
        </div>

        <div class="row2">
            <div id="m-synth" class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Synth</p>
				</a>
            </div>
            <div id="m-pad"  class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Pads</p>
				</a>
            </div>
        </div>
       

        <div class="row3">
            <div id="m-woodwind" class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Woodwind</p>
				</a>
            </div>
            <div id="m-drums" class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Drums</p>
				</a>
			</div>
        </div>

        <div class="row4">
            <div id="m-strings" class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Strings</p>
				</a>
            </div>
            <div id="m-brass" class="mood-divs">
				<a href="CategoryPicked.php">
					<p class="genre-tags">Brass</p>
				</a>
            </div>
        </div>

     

        <div class="invisdiv2"></div>

    </div>
    <div class="cmenu"></div>
    <nav class="container">
        <a class="buttons" href="ProfileIntroPage.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="#" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>

<script src="cmenuscript.js"></script>


</body>

</html>
