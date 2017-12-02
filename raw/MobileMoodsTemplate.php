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

        <h1 id="m-genresh">Moods</h1>

        <div id="catalogpage2">


            <div id="m-happy" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_happy'/>
					<input type="submit" class="genre-tags" value="Happy"/>
				</form>
            </div>


            <div id="m-sad" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_sad'/>
					<input type="submit" class="genre-tags" value="Sad"/>
				</form>
            </div>



            <div id="m-angry" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
				
					<input type="hidden" name="mood" value='g_angry'/>
					<input type="submit" class="genre-tags" value="Angry"/>
				</form>
            </div>

            <div id="m-chill" class="mood-divs">

				<form action="CategoryPicked.php" method="get" class="category_form">
					
					<input type="hidden" name="mood" value='g_chill'/>
					<input type="submit" class="genre-tags" value="Chill"/>
				</form>
            </div>

            <div id="m-focus" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
				
					<input type="hidden" name="mood" value='g_focus'/>
					<input type="submit" class="genre-tags" value="Focus"/>
				</form>
            </div>

            <div id="m-workout" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
				
					<input type="hidden" name="mood" value='g_workout'/>
					<input type="submit" class="genre-tags" value="Work Out"/>
				</form>
            </div>



            <div id="m-travel" class="mood-divs">
				<form action="CategoryPicked.php" method="get" class="category_form">
				
					<input type="hidden" name="mood" value='g_travel'/>
					<input type="submit" class="genre-tags" value="Travel"/>
				</form>
			</div>


        </div>
        <div id="invisdiv3"></div>

    </div>

    <nav class="container">
        <a class="buttons" href="ProfileIntroPage.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.php" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>
    <div class="cmenu"></div>


<script src="cmenuscript.js"></script>
    <script src="categoriesmenu.js"></script>

</body>

</html>
