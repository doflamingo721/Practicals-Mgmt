<html>
	
	<?php
	session_start();
		if(isset($_SESSION["username"])) {
	   if($_SESSION["username"] == "admin") header("refresh:0;url=../Admin/index.php");
	   if($_SESSION["username"] == "faculty") header("refresh:0;url=../Faculty/index.php");
	   if($_SESSION["username"] == "student") header("refresh:0;url=../Student/index.php");
 	}
	?>
	
<style>
.classname{
	background-color: #f8a5c2;
}
#main{
	width:100%;
	height:12%;
	text-align:center;
	font-family: joker;
	background-color: #34e7e4;
	padding:1em;
	margin:0;
	
	border-width:1;
}

#leftpane{
	width:13%;
	height:100%;
	text-align:left;
	border: 5em;
	float:left;
}
#rightpane{
	margin-left: 200px;
	height:100%;
	background-color: #C8E3E1;
    border-left: 1px solid gray;
    padding: 1em;
}
	
</style>
 <script src="../Assets/jquery.min.js" type="text/javascript"> 
    </script>
	<script>
		
    function loadLogin()
		 {
		 	$("#rightpane").load("LoginMaster.php");
		 }
	function loadHeader()
		 {
		 	$("#main").load("../Assets/header.php");
		 }	
		  
</script>
	
<body onload="loadLogin(),loadHeader()">

<div id="starting">

	<div id="main">
		
	</div>
	
	<div id="leftpane">
	</div>

	<div id="rightpane">
	</div>
	
</div>
</body>
</html>  