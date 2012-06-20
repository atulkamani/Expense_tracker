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
	if(checkEmail(document.getElementById('txtUserName').value)==false|| document.getElementById('txtUserName').value=='Your Email Address' ){
		alert("Please enter valid user name");
		document.getElementById('txtUserName').focus();
		return false;
	}
	if(document.getElementById('txtPassword').value.length==0 || document.getElementById('txtPassword').value == 'Password'){
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
function checkPhone(phone)
{
	var filter=/[0-9]+/
	if (filter.test(phone))
		return true
	else
		return false
}
function checkAccount()
{
	var email = document.getElementById("email");
	var emailerror = document.getElementById("emailError");
	var pass = document.getElementById("pass");
	var phone = document.getElementById("phone");
	if(email.value == "")
	{
		emailerror.style.display = "visible";
		emailerror.innerHTML = "Enter Email Address";
		email.focus();
		return false;
	}
	else if(checkEmail(ema.value) == false)
	{
		emailerror.style.display = "visible";
		emailerror.innerHTML = "Enter valid Email Address";
		email.focus();
		return false;
	}
	else if(pass.value == "")
	{
		pass.focus();
		return false;
	}
	else if(phone.value == "")
	{
		phone.focus();
		return false;
	}
	else if(checkPhone(phone.value) == false)
	{
		phone.focus();
		return false;
	}
	else
	{
		return true;
	}
}
//check for update
function updateProfile(){
	var phoneNo ="";
	var bio ="";
	var note ="";
	if(document.getElementById('txtFullName').value.length==0 || document.getElementById('txtFullName').value=='Full Name'){
		alert("Please enter full name");
		document.getElementById('txtFullName').focus();
		return false;
	}
	if(checkEmail(document.getElementById('txtEmail').value) == false || document.getElementById('txtEmail').value=='Email Address'){
		alert("Please enter valid email");
		document.getElementById('txtEmail').focus();
		return false;
	}
	if(document.getElementById('txtMobile').value.length == 0 || document.getElementById('txtMobile').value=='Mobile Number'){
		alert("Please enter mobile number");
		document.getElementById('txtMobile').focus();
		return false;
	}
	//check and store variable value
	if(document.getElementById('txtPhone').value=='Phone Number'){
		phoneNo = "";
	}else{
		phoneNo = document.getElementById('txtPhone').value;
	}
	if(document.getElementById('txaBio').value=='Bio'){
		bio= "";
	}else{
		bio = document.getElementById('txaBio').value;
	}
	if(document.getElementById('txaNote').value=='Notes'){
		note= "";
	}else{
		note = document.getElementById('txaNote').value;
	}

	
	var StrSet;
	StrSet = "&txtUName="+ $("#txtFullName").val().replace(/&/gi, "-");
	StrSet = StrSet + "&txtEmail="+ $("#txtEmail").val().replace(/&/gi, "-");	
	StrSet = StrSet + "&txtMobile="+ $("#txtMobile").val().replace(/&/gi, "-");	
	StrSet = StrSet + "&txtPhone="+ phoneNo.replace(/&/gi, "-");		
	StrSet = StrSet + "&txaBio="+ bio.replace(/&/gi, "-");			
	StrSet = StrSet + "&txaNote="+ note.replace(/&/gi, "-");				
	
	$.ajax({
		async: false,
		url: "ajaxResponse.php?task=editProfile&"+StrSet,
		type: "POST",
		success: function(data) {
			if(data == 'success'){
				alert("Profile updated successfully");
				window.location.href="profile.php";
			}
		}
	});
	return false
	return true;
}
//check welcome form or accordian validation
function accordianValidation(){
	var flag=false;
	if(document.getElementById('txtHomeOffice').value.length !=0){
		flag=true;
	}else if(document.getElementById('txtVehical').value.length !=0){
		flag=true;
	}else if(document.getElementById('txtTravel').value.length !=0){
		flag=true;
	}else if(document.getElementById('txtMeals').value.length !=0){
		flag=true;
	}else if(document.getElementById('txtGen').value.length !=0){
		flag=true;
	}
	else{
		alert("Please enter amount for calculation");
		return false;
	}
	return true;
}
//calculation and welcome page validation
function calcTax(txtHomeOffice,txtVehical,txtTravel,txtMeals,txtGen) {
	var txbHome = txtHomeOffice;
    var txbBusinessVehicle = txtVehical;
    var txbBusinessTravel = txtTravel;
    var txbMeals =txtMeals;
    var txbGeneral = txtGen;

	verifyInt(txbHome);
	verifyInt(txbBusinessVehicle);
	verifyInt(txbBusinessTravel);
	verifyInt(txbMeals);
	verifyInt(txbGeneral);


	var x18 = parseFloat(txbHome) * .2;
	if (isNaN(x18)) x18 = 0;
	var x22 = parseFloat(txbBusinessVehicle) * .55;
	if (isNaN(x22)) x22 = 0;
	var x26 = parseFloat(txbBusinessTravel);
	if (isNaN(x26)) x26 = 0;
	var x30 = parseFloat(txbMeals) * .5;
	if (isNaN(x30)) x30 = 0;
	var x34 = parseFloat(txbGeneral);
	if (isNaN(x34)) x34 = 0;

	var deductions = parseFloat(x18 + x22 + x26 + x30 + x34).toFixed(2);
	var taxBracket = parseFloat(.28);
	//alert(parseFloat(deductions * taxBracket).toFixed(2));
	document.getElementById('deductionText').value=deductions;
	document.getElementById('SavingAmt').value=parseFloat(deductions * taxBracket).toFixed(2);
	document.getElementById('deductionValue').innerHTML = "$"+deductions;
	document.getElementById('savingAmount').innerHTML = "$"+parseFloat((deductions * taxBracket)/12).toFixed(2);
	//alert(txbTotalDeductions.val(deductions));
	//alert(txbSavings.val(parseFloat(deductions * taxBracket).toFixed(2)));
}

var intRegex = /^\d+$/;
var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

function verifyInt(ele) {
	if (!floatRegex.test(ele))
		ele.value="";
}
//validation of save report
function saveReport(){
	if(document.getElementById('txtFullName').value.length==0 || document.getElementById('txtFullName').value=='Full Name'){
		alert("Please enter full name");
		document.getElementById('txtFullName').focus();
		return false;
	}
	if(checkEmail(document.getElementById('txtEmail').value)==false || document.getElementById('txtEmail').value=='Email Address'){
		alert("Please enter valid email");
		document.getElementById('txtEmail').focus();
		return false;
	}
	if(document.getElementById('txtMobile').value.length==0 || document.getElementById('txtMobile').value=='Mobile Number'){
		alert("Please enter mobile number");
		document.getElementById('txtMobile').focus();
		return false;
	}
}
//update Report/contact form
function updateCont(){
	if(document.getElementById('txtName').value.length==0){
		alert("Please enter name");
		document.getElementById('txtName').focus();
		return false;
	}
	if(checkEmail(document.getElementById('txtEmail').value)==false){
		alert("Please enter email");
		document.getElementById('txtEmail').focus();
		return false;
	}
	if(document.getElementById('txtMobile').value.length==0){
		alert("Please enter mobiel");
		document.getElementById('txtMobile').focus();
		return false;
	}
	var StrSet;
	StrSet = "&txtUName="+ $("#txtName").val().replace(/&/gi, "-");
	StrSet = StrSet + "&txtEmail="+ $("#txtEmail").val().replace(/&/gi, "-");	
	StrSet = StrSet + "&txtMobile="+ $("#txtMobile").val().replace(/&/gi, "-");	
	StrSet = StrSet + "&txaNote="+ $("#txaNote").val().replace(/&/gi, "-");					
	StrSet = StrSet + "&id="+ $("#hdnId").val().replace(/&/gi, "-");
	StrSet = StrSet + "&date1="+ $("#date1").val();
	
	$.ajax({
		async: false,
		url: "ajaxResponse.php?task=editContact&"+StrSet,
		type: "POST",
		success: function(data) {
			if(data == 'success'){
				alert("Contact updated successfully");
				window.location.href="previous-report.php";
			}
		}
	});
	return false
	
	
}