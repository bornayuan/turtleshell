

/**
 * Validate email address
 * 
 * @param stringValue
 * @returns {Boolean} return validate result
 */
function byncaEmailAddressValidation(stringValue) {
	var EMAIL_REGULATION = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/;
	var reg = new RegExp(EMAIL_REGULATION);
	if (stringValue.search(reg) != -1) {
		return true;
	} else {
		// window.alert("Please enter valid email address!");
		return false;
	}
}