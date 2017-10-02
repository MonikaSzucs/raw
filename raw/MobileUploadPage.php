<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="LargerScreens1024.css">
    <link rel="stylesheet" href="MediumScreen769And1023.css">
    <link rel="stylesheet" href="SmallScreen768version2.css">
    <link rel="stylesheet" href="SmallScreen768version2device.css">
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
        <div class="m-upload-div">
            <div id="reladiv">
                <div id="album-art-div">
                    <p id="upload-text">Upload Album Cover</p>
                </div>
            </div>
            <p class="upload-head">Title</p>
            <br />
            <input class="upload-inputs" id="m-album-title" type="text" name="albumname">
            <br />
            <p class="upload-head">Genre</p>
            <br />
            <input class="upload-inputs" id="m-genre-title" type="text" name="albumname">
            <br />
            <p class="upload-head">Description</p>
            <br />
            <input class="upload-inputs" id="m-description-title" type="text" name="albumname">

            <div id="uldiv">
                <button id="cancel-up" class="uplbuttons">cancel</button>
                <button id="save-up" class="uplbuttons">save</button>
            </div>

            <div id="invisdiv3"></div>

        </div>


    </div>

    <nav class="container">
        <a class="buttons" href="ProfileIntroPagevers2.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.php" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>
    <div class="cmenu"></div>


<script src="cmenuscript.js"></script>

</body>

</html>
