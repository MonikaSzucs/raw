<?php
	//the session_start() should always be at the top

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

	$query  = "SELECT * FROM groups LIMIT ,0,10 # Retrieve rows 0-10";
	
$result = mysqli_query($db, $query) or die('Error querying database.');

while ($row = mysqli_fetch_array($result)) 
{
	$row['group_title'];
}


	$a = array("1","2","3","4","5","6","7","8","9","10","11","12");
	
	$num = 0;
	$display = 4;
	$length = sizeof($a);
	$pages = ceil(sizeof($a)/5);
	$show = 5;

	echo $query;
	
/*
	$k = 1;
	echo "<pre>";
	
	function back(){
		
	};
	
	
	function forward(){
		$show = 10;
		echo "hi";
	};
	

	
	
	$pageNum = $show;
	$numPages = sizeof($a);
	
	$i = $pageNum - 5;
	if ($i <= 0){	
		$i = 1;
		$j = $pageNum + 5;
	}
	if ($j > $numPages)	{
		$j = $numPages;
	}
		
	if ($i > 5)	{
		echo '... ';
	}
	
	for ($i; $i <= $j; $i++) { 		
		echo " "; 		
		if ($i == $pageNum) 			
			echo "$i";		
		else 			
			echo "<a href=\"?page=$i\">$i</a>"; 
	}
	if($i < $numPages - 5){	
		echo ' ...';
	}
	
	

	while($num < $show){
		echo "<div style='background-color:red;width:50px;height:50px;margin-right:10px;float:left;'>$a[$num]</div>";
		$num++;
	};
	echo "<br/><br/><br/><br/>";
	echo "<div style='width: 500px; height: 55px; background-color: purple;'>";
		echo "<div style='left: 0; right: 0; margin: 0 auto; text-align: center'>";
			echo "<div style='height: 100%; background-color: pink; display: inline-block; position: relative'>";
				echo "<div style='background-color:orange;width:50px;height:50px; float: left;' onclick='back()'>back</div>";
				while ($k<=$pages){
					echo "<div style='background-color:red; width: 20px; float:left;'>$k</div>";
					$k++;
				}
				echo "<div style='background-color:yellow;width:50px;height:50px;margin-right:10px;float:left;' onclick='forward()'>Forward</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
	
	echo "</pre>";
*/	
?>