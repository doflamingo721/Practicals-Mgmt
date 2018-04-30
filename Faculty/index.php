<html>
	<?php
	session_start();
		if(isset($_SESSION["username"])) {
	   if($_SESSION["username"] == "admin") header("refresh:0;url=../Admin/index.php");
	   if($_SESSION["username"] == "student") header("refresh:0;url=../Student/index.php");
 	} else {
			header("refresh:0;url=../Login/");
		}
	?>
	
	<link rel="stylesheet" href="../Assets/css/style.css">
	
<style>
.classname{
overflow: auto;
  overflow-x: hidden;
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
   function abc()
    {
      $("#rightpane").load("demo.php");
    }
    
      function login()
    {
      $("#rightpane").load("logintrial.php");
    }
    function addassignment()
    {
      $("#rightpane").load("addAssignmentMaster.php");
    }

    function addnotice()
    {
      $("#rightpane").load("addNoticeMaster.php");
    }

    function showsubmissions()
    {
      $("#rightpane").load("evaluateAssignment.php");
    }
	

    function generatereport()
    {
      $("#rightpane").load("generateReport.php");
    }

	 function changepassword()
    {
      $("#rightpane").load("editProfileMaster.php");
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
					 case "addAssignmentMaster" : 
						 addassignment();
						 break;
					 case "addNoticeMaster" : 
						 addnotice();
						 break;
					 case "evaluateAssignment":
						 showsubmissions();
						 break;

						  case "generateReport":
						 generatereport();
						 break;
						  case "editProfileMaster":
						 changepassword()
						 break;
					 default : 
						 break;
				 }
			 }
			 
		 }	
			
</script>
  
<body onload="loadHeader()">
  <div id="starting" class="classname">
<div  id="main">
<h1>GOVERNMENT POLYTECHNIC PUNE</h1>
  </div>
  
  
<div id="leftpane">
  <ul>
      <li id="addbatch" onclick="addassignment()" align="left"><a href="#">Add Assignment</a></li>



      <li id="addcourse" onclick="addnotice()" align="left"><a href="#">Add Notice</a></li>


      <li id="addfaculty" onclick="showsubmissions()" align="left"><a href="#">Show Submissions</a></li>

       <li id="addfaculty" onclick="generatereport()" align="left"><a href="#">Generate Report</a></li>
	  
	  <li id="addfaculty" onclick="changepassword()" align="left"><a href="#">Change Password</a></li>

    <li id="logout" align="left"><a href="../Login/logout.php">Logout</a></li>  
   
    
  </ul>
    </div>
<div id="rightpane">
   
</div>
  </div>
</body>
</html>