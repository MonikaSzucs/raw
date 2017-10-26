<?php
	$a = array("1","2","3","4","5","6","7","8","9","10","11","12");
	
	$num = 0;
	$display = 4;
	$length = sizeof($a);
	$page = 1;
	echo "<pre>";
	
	function stuff(){
		
	};
	
	
	
	while($num < $length){
		echo "<div style='background-color:red;width:50px;height:50px;margin-right:10px;float:left;'>$a[$num]</div>";
		$num++;
	}
	echo "<br/><br/><br/><br/>";
	echo "<div style='background-color:orange;width:50px;height:50px;margin-right:10px;float:left;' onclick='stuff()'>back</div>";
	echo "<div style='background-color:yellow;width:50px;height:50px;margin-right:10px;float:left;'>Forward</div>";
	
	echo "</pre>";
?>