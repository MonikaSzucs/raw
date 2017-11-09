<?php 

//the session_start() should always be at the top
session_start();
//this is to make sure people can't access the pages unless they log in
if(!isset($_SESSION["user_id"]))
{
	session_destroy(); 
	header( 'Location: signout.php' ); 
};


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
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'raw');

	$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Error connecting to MySQL server.');
	print_r($_POST);
	if(isset($_POST['toDo'])){
		if($_POST['toDo']=="join"){
			$query = "INSERT INTO group_users (group_id, user_id)";
			$query .= " VALUES (" . $_POST['group_id'] . ", " . $_SESSION['user_id'] . ")";
			
			echo $query;
			$result = mysqli_query($db, $query);
			
		} else if($_POST['toDo']=="leave"){
			$query = "DELETE FROM group_users ";
			$query .= " WHERE group_id = " . $_POST['group_id'] . " AND user_id = " . $_SESSION['user_id'];
			
			//DELETE FROM group_users WHERE `group_id` = 46 AND  `user_id` = 1
			
			echo $query;
			$result = mysqli_query($db, $query) ;
		}
		
		

	}

	//SELECT * FROM `group_user` WHERE `user_id` = 1
	///I need to put a condition to make sure they aren't in that group already because if they are then don't show the join button.
	//then put the output in the array

	//mysqli_close($db);
	


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
              <a href="Streaming.php"><li>Explore</li></a>
                <a href="MobileGroupsTab.php"><li>Groups</li></a>
                <a href="MobileIGenresTemplate.php"><li>Genres</li></a>
                <li>
				<a href="MobileMoodsTemplate.php"><li>Moods</li></a>
				<!--
				surrounded by php
					if (isset(($_GET['Moods'])))
					<form action="MobileMoodsTemplate.php" method="get">
						<input type="hidden" name="group_id" value="<?php echo $_GET['genre']?>"/>
						<input type="submit" class="TopNavTextButtonStyle" value="Moods"/>
					</form>

				-->
				</li>
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
		
        <div class="white_background_group_Large">
			<div class="spaceContainerTop"><p>Groups</p></div>
			<a href="MobileGroupsTabCreate.php"><button id="CreateGroupProfile">Create Group</button></a>

	<?php
	

	$limit = 5;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * $limit;
	
	
	//get group?_user from data base where user id equal to session user ID
	$query = "SELECT * FROM group_users WHERE user_id =" . $_SESSION['user_id'];
	$result = mysqli_query($db, $query) or die('Error querying database.');
	$group_users = array(); 
	while ($row = mysqli_fetch_array($result)){
		$group_users[] = $row['group_id'];
	}
	
	//Step2 get data from database
	$query = "SELECT * FROM groups LIMIT " . $limit . " OFFSET " . $start_from;
	$result = mysqli_query($db, $query) or die('Error querying database.');
//Step3 Display the result


while ($row = mysqli_fetch_array($result)) {
	echo "<div style='height: 30px; width: 100%;'></div>";
	
	//
	//
	//Large screen area
	//
	//
	echo "<div class='LargeScreenGroup'>";
		echo "<div class='group_container_create'>";
			echo "<div class='group_photo_Area'>";
				if(empty($row['group_photo'] )){
					echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
				}
				else{
					echo "<td> <img src='" . $row['group_photo'] . "' class='circlePhotoUploaded' > </td>";
				}
				echo "</div>";
			echo "<div class='vertical_space_group'>";
				
				echo"<div class='groups_title_generate'>" . $row['group_title']; 
					
				echo "</div>";
				echo "<hr/>";
				echo "<div class='groups_descrition_generate'>" . substr($row['group_description'],0,120) . "...</div>";
				echo "<div class='LeaveButtonGroups'>";
					if(in_array($row['group_id'], $group_users))
					{
						//echo "already Joined";
						// DELETE FROM `group_users` WHERE `group_users`.`group_id` = 46 AND `group_users`.`user_id` = 1
					
						echo "<form action='' method='POST'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input type='hidden' name='toDo' value='leave'>";
							echo "<input class='Leave-Butt' type='submit' value='Leave'>";
						echo "</form>";
					
					}
					else{
						echo "<form action='' method='POST'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input type='hidden' name='toDo' value='join'>";
							echo "<input class='join-Butt' type='submit' value='join'>";
						echo "</form>";
					}
					
				echo "</div>";
				
				echo "<div class='EnterButtonGroups'>";
					if(in_array($row['group_id'], $group_users)){
						echo "<form action ='EnteredGroup.php' method='GET'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input class='Enter-Butt' type='submit' value='Enter'>";
						echo "</form>";
					}
				echo "</div>";
			echo "</div>";
		echo "</div>";
		

	echo "</div>";
	

	//
	//
	//Medium screen area
	//
	//
	echo "<div class='MediumScreenGroup'>";
		echo "<div class='M_group_container_create'>";
			echo "<div class='group_photo_Area'>";
				if(empty($row['group_photo'] )){
					echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
				}
				else{
					echo "<td> <img src='" . $row['group_photo'] . "' class='circlePhotoUploaded' > </td>";
				}
				echo "</div>";
			echo "<div class='M_vertical_space_group'>";
				
				echo"<div class='groups_title_generate'>" . substr($row['group_title'],0,40) . " ..."; 
					
				echo "</div>";
				echo "<hr/>";
				echo "<div class='groups_descrition_generate'>" . substr($row['group_description'],0,80) . " ...</div>";
				echo "<div class='LeaveButtonGroups'>";
					if(in_array($row['group_id'], $group_users))
					{
						//echo "already Joined";
						// DELETE FROM `group_users` WHERE `group_users`.`group_id` = 46 AND `group_users`.`user_id` = 1
					
						echo "<form action='' method='POST'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input type='hidden' name='toDo' value='leave'>";
							echo "<input class='M_Leave-Butt' type='submit' value='Leave'>";
						echo "</form>";
					
					}
					else{
						echo "<form action='' method='POST'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input type='hidden' name='toDo' value='join'>";
							echo "<input class='M_join-Butt' type='submit' value='join'>";
						echo "</form>";
					}
					
				echo "</div>";
				
				echo "<div class='EnterButtonGroups'>";
					if(in_array($row['group_id'], $group_users)){
						echo "<form action ='EnteredGroup.php' method='GET'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input class='M_Enter-Butt' type='submit' value='Enter'>";
						echo "</form>";
					}
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
	

	//
	//
	//Small screen area
	//
	//
	echo "<div class='SmallScreenGroup'>";
		echo "<div class='mob_group_container_create'>";
			echo "<div class='M_group_photo_Area'>";
				if(empty($row['group_photo'] )){
					echo "<img src='./SVG/EmptyPicture.svg' class='circlePhoto_group_Auto' /> ";
				}
				else{
					echo "<td> <img src='" . $row['group_photo'] . "' class='circlePhotoUploaded' > </td>";
				}
			echo "</div>";
			echo "<div class='M_vertical_space_group'>";
				echo"<div class='groups_title_generate'>" . substr($row['group_title'],0,20) . " ..."; 
				echo "</div>";
				echo "<hr/>";
				echo "<div class='groups_descrition_generate'>" . substr($row['group_description'],0,30) . " ...</div>";
				echo "<div class='LeaveButtonGroups'>";
					if(in_array($row['group_id'], $group_users))
					{
						//echo "already Joined";
						// DELETE FROM `group_users` WHERE `group_users`.`group_id` = 46 AND `group_users`.`user_id` = 1
					
						echo "<form action='' method='POST'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input type='hidden' name='toDo' value='leave'>";
							echo "<input class='s_Leave-Butt' type='submit' value='Leave'>";
						echo "</form>";
					
					}
					else{
						echo "<form action='' method='POST'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input type='hidden' name='toDo' value='join'>";
							echo "<input class='s_join-Butt' type='submit' value='join'>";
						echo "</form>";
					}
					
				echo "</div>";
				
				echo "<div class='EnterButtonGroups'>";
					if(in_array($row['group_id'], $group_users)){
						echo "<form action ='EnteredGroup.php' method='GET'>";
							echo "<input type='hidden' name='group_id' value='" . $row['group_id'] . "'>";
							echo "<input class='s_Enter-Butt' type='submit' value='Enter'>";
						echo "</form>";
					}
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
	} 


	$querry = "SELECT COUNT(group_id) FROM groups";  
	$rs_result = mysqli_query($db, $querry);  
	$row = mysqli_fetch_row($rs_result);  
	$total_records = $row[0];  
	$total_pages = ceil($total_records / $limit);  
	$pagLink = "<div class='pagination'>";  
		for ($i=1; $i<=$total_pages; $i++) {  
			$pagLink .= "<a href='MobileGroupsTab.php?page=".$i."'>".$i."&nbsp;&nbsp;&nbsp;</a>";  
		};  
	echo $pagLink . "</div>";  
	
	
?>
	
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


	<?php
	//Step 4 close the connection
	mysqli_close($db);
	echo "<br/><br/><br/>";
	?>

</html>

