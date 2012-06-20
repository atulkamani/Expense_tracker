// JavaScript Document
//email checking
function checkEmail(str){
var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
if (filter.test(str))
	return true
else
	return false
}
//login function
function checkLogin(){
	if(checkEmail(document.getElementById('txtUserName').value)==false|| document.getElementById('txtUserName').value=='Your Username' ){
		alert("Please enter valid user name");
		document.getElementById('txtUserName').focus();
		return false;
	}
	if(document.getElementById('txtPassword').value.length==0){
		alert("Please enter password");
		document.getElementById('txtPassword').focus();
		return false;
	}
	var StrSet;
	StrSet = "&txtUName="+ $("#txtUserName").val().replace(/&/gi, "-");
	StrSet = StrSet + "&txtPass="+ $("#txtPassword").val().replace(/&/gi, "-");	
	$.ajax({
		async: false,
		url: "ajaxResponse.php?task=login&"+StrSet,
		type: "POST",
		success: function(data) {
			if(data == 'success'){
				window.location.href="welcome.php";
			}else if(data == 'fail'){
				document.getElementById('errID').style.display = 'block';
			}
		}
	});
	return false
	return true;
}
function checkPhone(mobile)
{
	var filter=/[0-9]{10}/
	if (filter.test(mobile))
		return true
	else
		return false
}
function DuplicateURL(email){	
	var bodyContent = $.ajax({
      url: "checkDuplicate.php?email="+email,
      type: "POST",
      async:false
   }
).responseText;
return bodyContent;
}
function checkAccount()
{
	var fullName = document.getElementById("txtFullName");
	var fullNameError = document.getElementById("nameError");
	var email = document.getElementById("email");
	var emailerror = document.getElementById("emailError");
	var pass = document.getElementById("pass");
	var mobile = document.getElementById("mobile");
	var phoneError= document.getElementById("phoneError");
	
	if(fullName.value == "" || fullName.value == "Full Name")
	{
		fullNameError.style.display = "block";
		fullNameError.innerHTML = "Enter Full Name";
		fullNameError.focus();
		return false;
	}
	else if(email.value == "" || email.value == "Email Address")
	{
		emailerror.style.display = "block";
		fullNameError.style.display = "none";
		emailerror.innerHTML = "Enter Email Address";
		email.focus();
		return false;
	}
	else if(checkEmail(email.value) == false)
	{
		emailerror.style.display = "block";
		emailerror.innerHTML = "Enter valid Email Address";
		email.focus();
		return false;
	}
	else if(DuplicateURL(email.value) == "false")
	{
		emailerror.style.display = "block";
		emailerror.innerHTML = "This Email Address is already Exists..!";
		email.focus();
		return false;
	}
	else if(mobile.value == "" || mobile.value == "Mobile Phone Number")
	{
		phoneError.style.display = "block";
		fullNameError.style.display = "none";
		emailerror.style.display = "none";
		phoneError.innerHTML = "Enter Mobile Number";
		mobile.focus();
		return false;
	}
	else
	{
		phoneerror.style.display = "none";
		return true;
	}
}

function checkFogot()
{
	var email = document.getElementById("email");
	var emailerror = document.getElementById("emailError");	
	if(email.value == "" || email.value == "Email Address")
	{
		emailerror.style.display = "block";
		emailerror.innerHTML = "Enter Email Address";
		email.focus();
		return false;
	}
	else if(checkEmail(email.value) == false)
	{
		emailerror.style.display = "block";
		emailerror.innerHTML = "Enter valid Email Address";
		email.focus();
		return false;
	}
	else if(DuplicateURL(email.value) == "true")
	{
		emailerror.style.display = "block";
		emailerror.innerHTML = "This Email Address is not Exists..!";
		email.focus();
		return false;
	}	
	else
	{
		emailerror.style.display = "none";
		return true;
	}
}

function getPreReport(strval)
{
	if(strval.length == 0)
		window.location.href = "previous-report.php";
		
	var bodyContent = $.ajax({
      url: "searchReport.php?searchtext="+strval,
      type: "POST",
      async:false
   }).responseText;
	if(bodyContent != '')
	{
	 $('.aj_li_c').toggle(
		  function(){
			  $(this).parent().addClass("aj_play_cur");
			  $(this).next().stop(false,true).slideDown();
			  $(this).find(".aj_a_m").css({"background-position":"0 -43px","width":"20px","height":"15px","margin-right":"1px"})},
		  function(){
		  	  $(this).parent().removeClass("aj_play_cur");
			  $(this).next().stop(false,true).slideUp();
			  $(this).find(".aj_a_m").css({"background-position":"0 -58px","width":"15px","height":"20px","margin-right":"0px"})}
	  );
	  $('.aj_play').html(bodyContent);
	}	
}