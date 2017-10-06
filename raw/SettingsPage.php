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
                <a href="MobileUploadPage.html">
                    <div class="m-upload-button"></div>
                </a>
                  <div id="hamb" onclick="myFunction(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>

            <ul class="nav-bar">
                <li>Explore</li>
                <li>Genes</li>
                <li>Moods</li>
                <li>Instruments</li>
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
    <div id="m-main-pagesettings" class="main-page">
        
                        
<!--
        hamburger menu
        
-->
        <div id="hamburger"> 
            <ul id="hambul">
                <li class="hamclass">
                Profile
                </li>  
                <li class="hamclass">
                Sign Out
                </li>               
            </ul>
        </div>

        <h1 id="m-settings-h">Settings</h1>
        <p class="m-settings-info">Email Address</p>

        <hr>
        <br>

        <input id="m-email-input" type="text" name="email">

        <br>
        <br>
        <br>
        <br>

        <p class="m-settings-info">Password</p>
        <hr>
        <br>
        <button id="m-reset-button">Send password-reset Link</button>
        <br>
        <br>
        <br>
        <br>

        <p class="m-settings-info">Name</p>
        <hr>
        <br>
        <p id="fname" class="m-settings-info">First Name</p>
        <input id="m-firstname" type="text" name="bday">
        <br>
        <br>
        <br>
        <p id="lname"class="m-settings-info">Last Name</p>
        <input id="m-lastname" type="text" name="bday">

        <br>
        <br>
        <br>
        <br>
  
        

        <button id="m-save">SAVE</button>

        
    

        <div id="invisdiv3"></div>




    </div>

       


    <nav class="container">
        <a class="buttons" href="ProfileIntroPagevers2.html" tooltip="Profile"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.html" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.html" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.html" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.html" tooltip="Moods"></a><a class="buttons" href="#"><span><span class="rotate"></span></span></a></nav>

    <script src="cmenuscript.js"></script>

</body>

</html>
