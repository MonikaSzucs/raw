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

            <ul id="listdown" class="nav-bar">
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
    <div id="mpcat" class="main-page">


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

        <h1 id="m-genresh">Genres</h1>

        <div id="catalogpage2">

            <div id="m-rnb" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_rnb'/>
					<input type="submit" class="genre-tags" value="RNB"/>
				</form>
            </div>

            <div id="m-punk" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_punk'/>
					<input type="submit" class="genre-tags" value="Punk"/>
				</form>
            </div>

            <div id="m-rock" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_rock'/>
					<input type="submit" class="genre-tags" value="Rock"/>
				</form>
            </div>

            <div id="m-pop" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_pop'/>
					<input type="submit" class="genre-tags" value="Pop"/>
				</form>
            </div>

            <div id="m-jazz" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
				
					<input type="hidden" name="mood" value='g_jazz'/>
					<input type="submit" class="genre-tags" value="Jazz"/>
				</form>
            </div>

            <div id="m-metal" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_metal'/>
					<input type="submit" class="genre-tags" value="Metal"/>
				</form>
            </div>

            <div id="m-funk" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_funk'/>
					<input type="submit" class="genre-tags" value="Funk"/>
				</form>
            </div>

            <div id="m-country" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_country'/>
					<input type="submit" class="genre-tags" value="Country"/>
				</form>
            </div>

            <div id="m-edm" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_edm'/>
					<input type="submit" class="genre-tags" value="EDM"/>
				</form>
            </div>

            <div id="m-classical" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_classical'/>
					<input type="submit" class="genre-tags" value="Classical"/>
				</form>
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
<script src="categoriesmenu.js"></script>

</body>

</html>
