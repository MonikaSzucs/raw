
<!DOCTYPE html>
<html>

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>

<!--
	the nav must be outside of the div with class content so then the stuff in the middle of the page only changes and not the outer navs
-->
<!--Top header -->
header
<nav>
<li onclick="Red()">Red</li>
<li onclick="Green()">Green</li>
<li onclick="Blue()">Blue</li>

</nav>

<div id="content"></div>

<!--Music player area -->
<nav>
music
</nav>

</body>

<script>

var content = document.getElementById("content");

function Red() {
	console.log("hey");
	console.log(content);
    content.innerHTML='<object type="text/html" data="home.php" ></object>';
}

function Green() {
	console.log("hey");
	console.log(content);
    content.innerHTML='<object type="text/html" data="new.php" ></object>';
}

function Blue() {
	console.log("hey");
	console.log(content);
    content.innerHTML='<object type="text/html" data="last.php" ></object>';
}

</script>

</html>