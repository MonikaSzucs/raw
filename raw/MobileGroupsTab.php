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
			<div class="spaceContainerTop"><p>Groups</p></div>
			
			<a href="MobileGroupsTabCreate.php"><button id="CreateGroupProfile">Create Group</button></a>
			<div class="Profile-sub-container">
				<div class="TopSpace-ProfileGroupSub"></div>
				<div class="ProfileIconGroups"></div>
				<div class="vertical-space"></div>
				<div class="GroupsInformation">
				
					<div class="GroupsInformation-Title">
						Title<br/>
					</div>
					<div class="horizontal-GroupSpace">
					</div>
					<div class="GroupsInformation-Description">
						Description<br/>
					</div>	
						<!--
						<svg height="150" width="150">
						  <polygon points="20,10 20,50 50,30" style="fill:grey;stroke:black;stroke-width:1" />
						  Sorry, your browser does not support inline SVG.
						</svg>
						-->
						
				</div>
			</div>
        </div>

    </div>
    <nav class="container">
        <a class="buttons" href="ProfileIntroPagevers2.php" tooltip="Profile"></a>
         <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.php" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>

    <script src="cmenuscript.js"></script>




</body>

</html>
