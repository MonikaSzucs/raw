<?php 

//the session_start() should always be at the top
session_start();

echo "session_user_id" . "<br/>" . $_SESSION["user_id"];

/*
if(!isset($_SESSION["user_id"]))
{
	session_destroy(); 
	header( 'Location: signout.php' ); 
};
*/

//Step1 connect to database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'raw');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');

if(isset($_POST['toDo'])){
	print_r($_POST);

	
	$query = "INSERT INTO group_users (group_id, user_id)";
	$query .= " VALUES (" . $_POST['group_id'] . ", " . $_SESSION['user_id'] . ")";
	
	echo $query;
	$result = mysqli_query($db, $query) or die('Error querying database.');

}

//SELECT * FROM `group_user` WHERE `user_id` = 1
///I need to put a condition to make sure they aren't in that group already because if they are then don't show the join button.
//then put the output in the array



mysqli_close($db);
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


    </div>

    <nav class="container">
	<?php
	//get group?_user from data base where user id equal to session user ID
	$query = "SELECT * FROM group_users WHERE user_id =" . $_SESSION['user_id'];
	$result = mysqli_query($db, $query) or die('Error querying database.');
	
	$group_users = array(); 
	while ($row = mysqli_fetch_array($result)){
		$group_users[] = $row['group_id'];
	}
	
	//Step2 get data from database
	$query = "SELECT * FROM groups";
	$result = mysqli_query($db, $query) or die('Error querying database.');
//Step3 Display the result

echo "<table border='1' style='width:800px; margin:0 auto;'>";
echo "<tr>";
echo "<th  width='120px'> group_title </th>";
echo "<th  width='420px'> group_description </th>";
echo "<th> group_photo </th>";
echo "<th> Interested </th>";
echo "<th> Tracks </th>";
echo "</tr>";

while ($row = mysqli_fetch_array($result)) 
{
	echo "<tr>";
		echo "<td>" . $row['group_title'] . "</td>";  
		echo "<td>" . $row['group_description'] . "</td>"; 
		if(empty($row['group_photo'] )){
			echo "<td></td>";
		}
		else{
			echo "<td> <img src='" . $row['group_photo'] . "' style='width:100px;height:100px;' > </td>";
		}

		//join
		//condition if they are in the group then don't show the button
		
		echo "<td>";
			//if $row['group_id'] exit in $group_users['group_id'] do not show form;
			//else shows join form;
			
			/*echo '$row[group_id]'. $row['group_id'];

			echo '<BR/>$group_id THAT THIS PERSON ALREADY JOINED';
			echo "<pre>";
			print_r($group_users);
			echo "</pre>";	*/		
			
			if(in_array($row['group_id'], $group_users))
			{
				echo "already Joined";
			}
			else{
				echo "<form action='' method='POST'>";
					echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
					echo "<input type='hidden' name='toDo' value='join'>";
					echo "<input type='submit' value='join'>";
				echo "</form>";
			}
		echo "</td>";
		
		echo "<td >";
			echo "<form action ='GroupMusic.php' method='GET'>";
				echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
				echo "<input type='submit' value='Enter'>";
			echo "</form>";
		echo "</td>";
		
	echo "</tr>";
	
} 

echo "</table>";
?>
        <a class="buttons" href="ProfileIntroPagevers2.php" tooltip="Profile"></a>
        <a class="buttons" href="MobileGroupsTab.php" tooltip="Groups"></a>
        <a class="buttons" href="MobileInsturmentsTemplate.php" tooltip="Instruments"></a>
        <a class="buttons" href="MobileExplorePage.php" tooltip="Explore"></a>
        <a class="buttons" href="MobileIGenresTemplate.php" tooltip="Genres"></a>
        <a class="buttons" href="MobileMoodsTemplate.php" tooltip="Moods"></a><a class="buttons" href="#" tooltip="Compose"><span><span class="rotate"></span></span></a></nav>
    <div class="cmenu"></div>


<script src="cmenuscript.js"></script>

</body>


<?php
//Step 4 close the connection
mysqli_close($db);
echo "<br/><br/><br/>";
?>

</html>

