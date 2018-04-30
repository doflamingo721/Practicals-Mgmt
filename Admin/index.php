<html>
	<?php
	session_start();
		if(isset($_SESSION["username"])) {
	   if($_SESSION["username"] == "faculty") header("refresh:0;url=../Faculty/index.php");
	   if($_SESSION["username"] == "student") header("refresh:0;url=../Student/index.php");
 	} else {
			header("refresh:0;url=../Login/");
		}
	?>
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
    padding: 1em;
}
</style>
 <script src="../Assets/jquery.min.js" type="text/javascript"></script> 
    <script> 

		
		  function login()
		{
			$("#rightpane").load("logintrial.php");
		}
		function addbatch()
		{
			$("#rightpane").load("../Admin/addBatchMaster.php");
		}
		
		function addclass()
		{
			$("#rightpane").load("../Admin/addClassMaster.php");
		}
		
		function addcourse()
		{
			$("#rightpane").load("../Admin/addCourseMaster.php");
		}
		
		function addfaculty()
		{
			$("#rightpane").load("../Admin/addFacultyMaster.php");
		}
		
		function addstudent()
		{
			$("#rightpane").load("../Admin/addStudentMaster.php");
		}

		function addsemester()
		{
			$("#rightpane").load("../Admin/addRoleMaster.php");
		}
		
		function addsemester()
		{
			$("#rightpane").load("../Admin/addSemester.php");
		}
		

		function allocation()
		{
			$("#rightpane").load("../Admin/divisionAllocation.php");
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
					 case "addBatchMaster" : 
						 addbatch();
						 break;
					 case "addClassMaster" : 
						 addclass();
						 break;
					case "addCourseMaster" : 
						 addcourse();
						 break;
					case "addFacultyMaster" : 
						 addfaculty();
						 break;
						 case "addStudentMaster" : 
						 addstudent();
						 break;
				    case "addSemester" : 
						 addsemester();
						 break;
				    case "divisionAllocation" : 
						 allocation();
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
		  <li id="addbatch" onclick="addbatch()" align="left"><a href="#">Add Batch</a></li>

		  <li id="addclass" onclick="addclass()" align="left"><a href="#">Add Class</a></li>


		  <li id="addcourse" onclick="addcourse()" align="left"><a href="#" align="left">Add Course</a></li>


		  <li id="addfaculty" onclick="addfaculty()" align="left"><a href="#" align="left">Add Faculty</a></li>

		  <li id="addfaculty" onclick="addstudent()" align="left"><a href="#" align="left">Add Student</a></li>


		  <li id="addsemester" onclick="addsemester()" align="left"><a href="#">Add Semester</a></li>

			<li id="teacherstudentallocation" onclick="allocation()" align="left"><a href="#">Allocation</a></li>

	        <li id="logout" align="left"><a href="../Login/logout.php"	>Logout</a></li>

	  
	</ul>
		</div>
<div id="rightpane">
   
</div>
	</div>
</body>
</html>