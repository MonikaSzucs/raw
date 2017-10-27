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

        <div class="m-profile-box">
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


        <div class="m-profile-main">

        </div>

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




</body>

</html>
