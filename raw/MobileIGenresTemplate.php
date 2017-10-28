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
    <link rel="stylesheet" href="SmallScreen768version2device.css">
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
    <div id="mpcat" class="main-page">


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

        <h1 id="m-genresh">Genres</h1>

        <div id="catalogpage2">
        <div class="row1">
            <div id="m-rnb" class="mood-divs">
                <p class="genre-tags">RNB
                </p>
            </div>
            
            <div id="m-punk" class="mood-divs">
                <p class="genre-tags">Punk
                </p>
            </div>
            
        </div>

        <div class="row2">
            <div id="m-rock" class="mood-divs">
                <p class="genre-tags">Rock
                </p>
            </div>
            <div id="m-pop" class="mood-divs">
                <p class="genre-tags">Pop
                </p>
            </div>
        </div>

        <div class="row3">
            <div id="m-jazz" class="mood-divs">
                <p class="genre-tags">Jazz
                </p>
            </div>
            <div id="m-metal" class="mood-divs">
                <p class="genre-tags">Metal
                </p>
            </div>
        </div>

        <div class="row4">
            <div id="m-funk" class="mood-divs">
                <p class="genre-tags">Funk
                </p>
            </div>
            <div id="m-country" class="mood-divs">
                <p class="genre-tags">Country
                </p>
            </div>
        </div>

        <div class="row5">
            <div id="m-edm" class="mood-divs">
                <p class="genre-tags">EDM
                </p>
            </div>
            <div id="m-classical" class="mood-divs">
                <p class="genre-tags">Classical
                </p>
            </div>
        </div>
            
            </div>


        <div class="invisdiv2"></div>
    </div>

    <nav class="container">
        <a class="buttons" href="ProfileIntroPage.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.php" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#"><span><span class="rotate"></span></span></a></nav>



<script src="cmenuscript.js"></script>

</body>

</html>
