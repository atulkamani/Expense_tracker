function calcTax() {
/*    var txbHome = $("#ctl00_ctl00_body_body_txbHome");
    var txbBusinessVehicle = $("#ctl00_ctl00_body_body_txbBusinessVehicle");
    var txbBusinessTravel = $("#ctl00_ctl00_body_body_txbBusinessTravel");
    var txbMeals = $("#ctl00_ctl00_body_body_txbMeals");
    var txbGeneral = $("#ctl00_ctl00_body_body_txbGeneral");
    var txbTotalDeductions = $("#ctl00_ctl00_body_body_txbTotalDeductions");
    var ddlTaxBracket = $("#ctl00_ctl00_body_body_ddlTaxBracket");
    var txbSavings = $("#ctl00_ctl00_body_body_txbSavings");
*/
	
	verifyInt(txbHome);
	verifyInt(txbBusinessVehicle);
	verifyInt(txbBusinessTravel);
	verifyInt(txbMeals);
	verifyInt(txbGeneral);

	var x18 = parseFloat(txbHome.val()) * .2;
	if (isNaN(x18)) x18 = 0;
	var x22 = parseFloat(txbBusinessVehicle.val()) * .55;
	if (isNaN(x22)) x22 = 0;
	var x26 = parseFloat(txbBusinessTravel.val());
	if (isNaN(x26)) x26 = 0;
	var x30 = parseFloat(txbMeals.val()) * .5;
	if (isNaN(x30)) x30 = 0;
	var x34 = parseFloat(txbGeneral.val());
	if (isNaN(x34)) x34 = 0;

	var deductions = parseFloat(x18 + x22 + x26 + x30 + x34).toFixed(2);
	var taxBracket = parseFloat(ddlTaxBracket.val());
	txbTotalDeductions.val(deductions);
	txbSavings.val(parseFloat(deductions * taxBracket).toFixed(2));
}

var intRegex = /^\d+$/;
var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

function verifyInt(ele) {
	if (!floatRegex.test(ele.val()))
		ele.val("");
}