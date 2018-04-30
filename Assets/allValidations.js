
function validateBatch()
	{
	var regex = /^[A-Z]$/;
    var ctrl =  document.getElementById("batch").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid Batch Name");
		// document.getElementById("submit").disabled = true; 
		document.getElementById("batch").value="";
		document.getElementById("batch").focus();
	}
	}
	
	
	function validateClass()
	{
	var regex = /^[A-Z]{1}[0-9]{0,2}$/;
    var ctrl =  document.getElementById('classadd').value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid Class Name");
		document.getElementById("classadd").value="";
		document.getElementById("classadd").focus();
		
	}
	}
	
	
function validateSemester()
	{
	var regex = /^[A-Z]{1,}[0-9]{2,4}$/;
    var ctrl =  document.getElementById('semadd').value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid name in format EVEN/ODD YYYY");
		document.getElementById("semadd").value="";
	}
	}
	
	
	function validateCourseName()
{
    var regex = /^[a-zA-Z ]{2,30}$/;
    var ctrl =  document.getElementById("coursename").value;
	
		if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid Course Name");
		document.getElementById("coursename").value="";
		document.getElementById("coursename").focus();
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
		document.getElementById("coursecode").focus();
	}
	}

	
	
	
	
function validateFName()
{
	
    var regex = /^[A-Z][a-z]{2,30}$/;
    var ctrl =  document.getElementById("fname").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Please check that the First alphabet is capital and there are no numbers and special symbols in this field");
		document.getElementById("fname").value="";
		document.getElementById("fname").focus();
	}
}
function validateLName()
{
	
    var regex = /^[A-Z][a-z]{2,30}$/;
    var ctrl =  document.getElementById("lname").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Please check that the First alphabet is capital and there are no numbers and special symbols in this field");
		document.getElementById("lname").value="";
		document.getElementById("lname").focus();
	}
}
function validateMName()
{
	
    var regex = /^[A-Z][a-z]{2,30}$/;
    var ctrl =  document.getElementById("mname").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Please check that the First alphabet is capital and there are no numbers and special symbols in this field");
		document.getElementById("mname").value="";
		document.getElementById("mname").focus();
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
		document.getElementById("enrollmentid").focus();
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
		document.forms.deleteStudentMaster.enrollmentid.focus();
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
		document.getElementById("uname").focus();
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
		document.forms.deleteRoleMaster.uname.focus();
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
		document.forms.deleteRoleMaster.password.focus();
	}
}


function validateUserId()
{
	
    var regex = /^[a-zA-Z ]{2,30}[0-9]{0,10}$/;
    var ctrl =  document.getElementById("username").value;
	if (regex.test(ctrl)!=true) 
	{
		alert("Enter a valid User Name");
		document.getElementById("username").value="";
		document.getElementById("username").focus();
	}
}





function validateUserName()
{
	
    var regex = /^[a-zA-Z ]{2,30}[0-9]{0,10}$/;
    var ctrl =  document.getElementById("username").value;
	if (regex.test(ctrl)!=true) 

	{
		alert("Enter a valid User Name");
		 document.getElementById("change").value="";
		document.getElementById("change").focus();
		
	}
}
function validateInputFile() 
    {
        var input_file = document.getElementById("input_file");
        if (typeof (input_file.files) != "undefined") {
            var size = parseFloat(input_file.files[0].size).toFixed(2);
            if((size <= 0) || (size >= 65535))
            {
                document.getElementById("ihidden").value ="File size Exceeded (64kB)";
                document.getElementById("ihidden").style.display="inline-block";
                
                document.getElementById("input_file").value="";
            }
            else
            {           
               
                document.getElementById("ihidden").style.display="none";

            }
        } 
        else 
        {
            alert("This browser does not support HTML5.");
        }
    }
    function validateOutputFile() 
    {                   
        var output_file = document.getElementById("output_file");
        if (typeof (output_file.files) != "undefined")
         {
            var size = parseFloat(output_file.files[0].size).toFixed(2);
            if((size <= 0) || (size >= 65535))
            {
                document.getElementById("ohidden").value ="File size Exceeded (64kB)";
                document.getElementById("ohidden").style.display="inline-block";
               
                document.getElementById("output_file").value="";
				document.getElementById("output_file").focus();
            }
            else
            { 

               document.getElementById("ohidden").style.display="none";

            }
        } 
        else 
        {
            alert("This browser does not support HTML5.");
        }
    }




		var users = new Array();
			flag=0
			function createUsername()
			{
				var i=0;
				with(window.document.forms.facultyInfo)
		        {
		            if((fname.value.length>0) && (mname.value.length>0) && (lname.value.length>0))
		            {
		                uname.readonly=false;
		                uname.value=fname.value.substr(0,1)+mname.value.substr(0,1)+lname.value;
						uname.value=uname.value.toLowerCase();
		                uname.readonly=true;	
		                for(i=0;i<users.length;i++)
		                {
		                	if(users[i] == uname.value)
		                	{
		                		flag+=1;
		                		 if(flag == 0)
				                {
				                	uname.value=uname.value;
				                }
				                else
				                {
				                	uname.value=uname.value+flag;
				            	}
		                	}
		                }
		               
		            }
				}
			}
