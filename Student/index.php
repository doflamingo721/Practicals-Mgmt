<html>
<link rel="stylesheet" href="../Assets/css/style.css">
	<?php
	session_start();
		if(isset($_SESSION["username"])) {
	   if($_SESSION["username"] == "admin") header("refresh:0;url=../Admin/index.php");
	   if($_SESSION["username"] == "faculty") header("refresh:0;url=../Faculty/index.php");
 	} else {
			header("refresh:0;url=../Login/");
		}
	?>
<style>
.classname{
  overflow: auto;
  overflow-x: hidden;
	overflow-y: hidden;
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
	
	float:left;
}
#rightpane{
	margin-left: 200px;
	height:100%;
	background-color: #C8E3E1;
    padding: 1em;
}
</style>
 <script src="../Assets/jquery.min.js" type="text/javascript"></script> 
    <script> 
   function assignmentupload()
    {
      $("#rightpane").load("assignmentUpload.php");
    }
    function shownotice()
    {
      $("#rightpane").load("showNotices.php");
    }

    function showmarks()
    {
      $("#rightpane").load("assignmentMarks.php");
    }

   
	function loadHeader()
		 {
		 	$("#main").load("../Assets/header.php");
			var mUrl = window.location.hash;
			console.log(mUrl);
			var option = mUrl.split("#")[1];
			 console.log(option);
			 if(option != null) {
				 switch(option) {
					 case "assignmentUpload" : 
						 assignmentupload();
						 break;
					 case "showNotice" : 
						 shownotice();
						 case "assignmentMarks" : 
						 showmarks();
						 break;
					 default : 
						 break;
				 }
			 }
			 
		 }	
			
</script>
  
<body onload="loadHeader()">
  <div id="starting" class="classname">
<div  id="main" class="classname">
<h1>GOVERNMENT POLYTECHNIC PUNE</h1>
  </div>
  
  
<div id="leftpane">
  <ul>
      <li id="assignmentupload" onclick="assignmentupload()" align="left"><a href="#">Assignment Upload</a></li>

      <li id="shownotice" onclick="shownotice()" align="left"><a href="#">Show Notice</a></li>

      <li id="shownotice" onclick="showmarks()" align="left"><a href="#">Show Marks</a></li>

      <li id="logout" onclick="logout()" align="left"><a href="../Login/logout.php">Logout</a></li>

    
  </ul>
    </div>
<div id="rightpane">
   
</div>
  </div>
</body>
</html>  