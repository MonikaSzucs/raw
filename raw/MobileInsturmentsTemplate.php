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
    <div class="main-page">
        <h1 id="m-genresh">Instruments</h1>
        
    
        <div class="row1">
            <div id="m-guitar" class="mood-divs">
                <p class="genre-tags">Guitar
                </p>
            </div>
            <div id="m-bass" class="mood-divs">
             <p class="genre-tags">Bass
                </p>
            </div>
        </div>

        <div class="row2">
            <div id="m-synth" class="mood-divs">
                 <p class="genre-tags">Synth
                </p>
            </div>
            <div id="m-pad"  class="mood-divs">
             <p class="genre-tags">Pads
                </p>
            </div>
        </div>
       

        <div class="row3">
            <div id="m-woodwind" class="mood-divs">
             <p class="genre-tags">Woodwind
                </p>
            </div>
            <div id="m-drums" class="mood-divs">   <p class="genre-tags">Drums
                </p></div>
        </div>

        <div class="row4">
            <div id="m-strings" class="mood-divs">
               <p class="genre-tags">Strings
                </p>
            </div>
            <div id="m-brass" class="mood-divs">
               <p class="genre-tags">Brass
                </p>
            </div>
        </div>

     

        <div class="invisdiv2"></div>

    </div>
    <div class="cmenu"></div>
    <nav class="container">
        <a class="buttons" href="ProfileIntroPagevers2.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="#" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>

<script src="cmenuscript.js"></script>


</body>

</html>
