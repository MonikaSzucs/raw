<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="LargerScreens1024.css">
    <link rel="stylesheet" href="MediumScreen769And1023.css">
    <link rel="stylesheet" href="SmallScreen768.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header class="main-header">
        <nav>
            <div class="header">
                <div class="toggle-logo"> </div>
                <div class = "m-upload-button"></div>
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


    <div class="track-player"></div>
    <div class="main-page">

        <a href="ProfilePage.php"><div class="m-profile-box" >
            <div id="m-profile-pic-intro"></div>
            <div id="m-view-profile-div">
                <p id="name">Name</p>
            <p id="view-profile">View Profile</p>
            
            </div>
        </div>
        </a>    
        <div class="m-settings-box">
            
            <div  class="m-center-text" id="m-message-button">
                Messages
                <div id="m-messicon" class="m-sicon"></div>
            </div>
            
            <div class="m-center-text" id="m-notifications-button">
                Notifications
                <div id="m-noticon" class="m-sicon"></div>
            </div>
            
            <div class="m-center-text" id="m-settings-button">
                Settings
                <div id="m-seticon" class="m-sicon"></div>
            </div>
            
        </div>

        <div  class="m-center-text" id="m-signout-box">
            Sign Out
             <div id="m-signicon" class="m-sicon"></div>
        </div>

    </div>
    <div id="cmenu">
        <div id="m-wrench"></div>
    </div>
    
    <script src="cmenuscript.js"></script>




</body>

</html>
