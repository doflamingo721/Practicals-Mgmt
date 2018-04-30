
//addBatchMaster.php
function validateBatch()
	{
	var regex = /^[A-Z]$/;
    var ctrl =  document.getElementById("batch").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid name");
		// document.getElementById("submit").disabled = true; 
		document.getElementById("batch").value="";
	}
	}
	
	
	function validateClass()
	{
	var regex = /^[A-Z]{1}[0-9]{0,2}$/;
    var ctrl =  document.getElementById('classadd').value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid name");
		document.getElementById("classadd").value="";
	}
	}
	
	
	
	function validateCourseName()
{
    var regex = /^[a-zA-Z ]{2,30}$/;
    var ctrl =  document.getElementById("coursename").value;
	
		if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid name");
		document.getElementById("coursename").value="";
	}
	
}
function validateCourseCode()
	{
	var regex = /^[A-Z]{2}[0-9]{3}$/;
    var ctrl =  document.getElementById("coursecode").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid Course Code");
		document.getElementById("coursecode").value="";
	}
	}

	
	
	
	function createUsername()
			{
				with(window.document.forms.facultyInfo)
		        {
		            if(fname.value.length>0 && mname.value.length>0 && lname.value.length>0)
		            {
		                uname.readonly=false;
		                uname.value=fname.value.substr(0,1)+mname.value.substr(0,1)+lname.value;
						uname.value=uname.value.toLowerCase();
		                uname.readonly=true;
		                alert("Your username : "+uname.value);
		            }
		        }
			}
function validateFName()
{
	
    var regex = /^[A-Z][a-z]{2,30}$/;
    var ctrl =  document.getElementById("fname").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid First Name");
		document.getElementById("fname").value="";
	}
}
function validateLName()
{
	
    var regex = /^[A-Z][a-z]{2,30}$/;
    var ctrl =  document.getElementById("lname").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid Last Name");
		document.getElementById("lname").value="";
	}
}
function validateMName()
{
	
    var regex = /^[A-Z][a-z]{2,30}$/;
    var ctrl =  document.getElementById("mname").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid name");
		document.getElementById("mname").value="";
	}
}




function validateEnrollNo()
{
	var regex = /^[0-2][0-9][0-2][6][0-9][0-9][0-9]$/;
	var ctrl =  document.getElementById("enrollmentid").value;
	if (regex.test(ctrl)!=true) 
	{
		
		alert("Enter a valid Enrollment Number");
		 document.getElementById("enrollmentid").value="";
	}
}

function validateDeleteStudent()
{
	
    var regex = /^[0-2][0-9][0-2][6][0-9][0-9][0-9]$/;
    var ctrl =  document.forms.deleteStudentMaster.enrollmentid.value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid Enrollment ID");
		document.forms.deleteStudentMaster.enrollmentid.value="";
	}
}






function validateUName()
{
	
    var regex = /^[a-zA-Z]{2,30}[0-9]{0,10}$/;
    var ctrl =  document.getElementById("uname").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid User Name");
		document.getElementById("uname").value="";
	}
}
function validateDeleteName()
{
	  var regex = /^[a-zA-Z ]{2,30}[0-9]{0,10}$/;
    var ctrl =  document.forms.deleteRoleMaster.uname.value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid User Name");
		document.forms.deleteRoleMaster.uname.value="";
	}
}
function validateDeletePassword()
{
	  var regex = /^[a-zA-Z]{2,30}[0-9]{0,10}$/;
    var ctrl =  document.forms.deleteRoleMaster.password.value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid Password");
		document.forms.deleteRoleMaster.password.value="";
	}
}


/*function validateUserId()
{
	
    var regex = /^[a-zA-Z ]{0,30}[0-9]{0,10}$/;
    var ctrl =  document.getElementById("username").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid User Name");
		document.getElementById("username").value="";
	}
}*/





function validateUserName()
{
	
    var regex = /^[a-zA-Z ]{2,30}[0-9]{0,10}$/;
    var ctrl =  document.getElementById("username").value;
	if (regex.test(ctrl)) 
	{
		document.getElementById("change").disabled = false;
	}
	else
	{
		alert("Enter a valid User Name");
		 document.getElementById("change").disabled = true; 
	}
}
