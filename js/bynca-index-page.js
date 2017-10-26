/**
 * Initialize all necessary methods, and this method will be called by web page
 * loading.
 */
function byncaInitializeIndexPage() {
	byncaInitializeIndexPageCountryName();
	byncaInitializeIndexPageEvents();
}

/**
 * Initialize events for all web components
 */
function byncaInitializeIndexPageEvents() {
	/*
	 * Initialize popover events
	 */
	$("#byncaRootCertificatesLink").popover();
	$("#countryName").popover();
	$('#stateOrProvinceName').popover();
	$("#localityName").popover();
	$("#organizationName").popover();
	$("#organizationalUnitName").popover();
	$("#commonName").popover();
	$("#emailAddress").popover();
	$("#keyPassword").popover();
	$("#keyPassword2").popover();
	$("#resetFormButton").popover();
	$("#validateFormButton").popover();
	$("#submitFormButton").popover();
}

/**
 * Initialize country name list values
 */
function byncaInitializeIndexPageCountryName() {
	var countryNameOptions = "<option value=\"\">-- Country --</option>"
			+ "<option value=\"AF\">(AF) Afghanistan</option>"
			+ "<option value=\"AL\">(AL) Albania</option>"
			+ "<option value=\"DZ\">(DZ) Algeria</option>"
			+ "<option value=\"AS\">(AS) American Samoa</option>"
			+ "<option value=\"AD\">(AD) Andorra</option>"
			+ "<option value=\"AO\">(AO) Angola</option>"
			+ "<option value=\"AV\">(AV) Anguilla</option>"
			+ "<option value=\"AQ\">(AQ) Antarctica</option>"
			+ "<option value=\"AG\">(AG) Antigua and Barbuda</option>"
			+ "<option value=\"AR\">(AR) Argentina</option>"
			+ "<option value=\"AM\">(AM) Armenia</option>"
			+ "<option value=\"AA\">(AA) Aruba</option>"
			+ "<option value=\"AU\">(AU) Australia</option>"
			+ "<option value=\"AT\">(AT) Austria</option>"
			+ "<option value=\"AZ\">(AZ) Azerbaijan</option>"
			+ "<option value=\"BF\">(BF) Bahamas</option>"
			+ "<option value=\"BH\">(BH) Bahrain</option>"
			+ "<option value=\"BB\">(BB) Barbados</option>"
			+ "<option value=\"BD\">(BD) Bangladesh</option>"
			+ "<option value=\"BY\">(BY) Belarus</option>"
			+ "<option value=\"BE\">(BE) Belgium</option>"
			+ "<option value=\"BZ\">(BZ) Belize</option>"
			+ "<option value=\"BJ\">(BJ) Benin</option>"
			+ "<option value=\"BM\">(BM) Bermuda</option>"
			+ "<option value=\"BS\">(BS) Bahamas</option>"
			+ "<option value=\"BT\">(BT) Bhutan</option>"
			+ "<option value=\"BW\">(BW) Botswana</option>"
			+ "<option value=\"BO\">(BO) Bolivia</option>"
			+ "<option value=\"BA\">(BA) Bosnia and Herzegovina</option>"
			+ "<option value=\"BV\">(BV) Bouvet Island</option>"
			+ "<option value=\"BR\">(BR) Brazil</option>"
			+ "<option value=\"IO\">(IO) British Indian Ocean Territory</option>"
			+ "<option value=\"BN\">(BN) Brunei Darussalam</option>"
			+ "<option value=\"BG\">(BG) Bulgaria</option>"
			+ "<option value=\"BF\">(BF) Burkina Faso</option>"
			+ "<option value=\"BI\">(BI) Burundi</option>"
			+ "<option value=\"KH\">(KH) Cambodia (Internet)</option>"
			+ "<option value=\"CB\">(CB) Cambodia (CIA World Fact Book)</option>"
			+ "<option value=\"CM\">(CM) Cameroon</option>"
			+ "<option value=\"CA\">(CA) Canada</option>"
			+ "<option value=\"CV\">(CV) Cape Verde</option>"
			+ "<option value=\"KY\">(KY) Cayman Islands</option>"
			+ "<option value=\"CF\">(CF) Central African Republic</option>"
			+ "<option value=\"TD\">(TD) Chad</option>"
			+ "<option value=\"CL\">(CL) Chile</option>"
			+ "<option value=\"CN\">(CN) China</option>"
			+ "<option value=\"CX\">(CX) Christmas Island</option>"
			+ "<option value=\"CC\">(CC) Cocos (Keeling) Islands</option>"
			+ "<option value=\"CO\">(CO) Colombia</option>"
			+ "<option value=\"KM\">(KM) Comoros</option>"
			+ "<option value=\"CG\">(CG) Congo</option>"
			+ "<option value=\"CD\">(CD) Congo, Democratic Republic</option>"
			+ "<option value=\"CK\">(CK) Cook Islands</option>"
			+ "<option value=\"CR\">(CR) Costa Rica</option>"
			+ "<option value=\"CI\">(CI) Cote D'Ivoire (Ivory Coast)</option>"
			+ "<option value=\"HR\">(HR) Croatia (Hrvatska)</option>"
			+ "<option value=\"CU\">(CU) Cuba</option>"
			+ "<option value=\"CY\">(CY) Cyprus</option>"
			+ "<option value=\"CZ\">(CZ) Czech Republic</option>"
			+ "<option value=\"CS\">(CS) Czechoslovakia (former)</option>"
			+ "<option value=\"DK\">(DK) Denmark</option>"
			+ "<option value=\"DJ\">(DJ) Djibouti</option>"
			+ "<option value=\"DM\">(DM) Dominica</option>"
			+ "<option value=\"DO\">(DO) Dominican Republic</option>"
			+ "<option value=\"TP\">(TP) East Timor</option>"
			+ "<option value=\"EC\">(EC) Ecuador</option>"
			+ "<option value=\"EG\">(EG) Egypt</option>"
			+ "<option value=\"SV\">(SV) El Salvador</option>"
			+ "<option value=\"GQ\">(GQ) Equatorial Guinea</option>"
			+ "<option value=\"ER\">(ER) Eritrea</option>"
			+ "<option value=\"EE\">(EE) Estonia</option>"
			+ "<option value=\"ET\">(ET) Ethiopia</option>"
			+ "<option value=\"FK\">(FK) Falkland Islands (Malvinas)</option>"
			+ "<option value=\"FO\">(FO) Faroe Islands</option>"
			+ "<option value=\"FJ\">(FJ) Fiji</option>"
			+ "<option value=\"FI\">(FI) Finland</option>"
			+ "<option value=\"FR\">(FR) France</option>"
			+ "<option value=\"FX\">(FX) France, Metropolitan</option>"
			+ "<option value=\"GF\">(GF) French Guiana</option>"
			+ "<option value=\"PF\">(PF) French Polynesia</option>"
			+ "<option value=\"TF\">(TF) French Southern Territories</option>"
			+ "<option value=\"MK\">(MK) F.Y.R.O.M. (Macedonia)</option>"
			+ "<option value=\"GA\">(GA) Gabon</option>"
			+ "<option value=\"GM\">(GM) Gambia</option>"
			+ "<option value=\"GE\">(GE) Georgia</option>"
			+ "<option value=\"DE\">(DE) Germany</option>"
			+ "<option value=\"GH\">(GH) Ghana</option>"
			+ "<option value=\"GI\">(GI) Gibraltar</option>"
			+ "<option value=\"GB\">(GB) Great Britain (UK)</option>"
			+ "<option value=\"GR\">(GR) Greece</option>"
			+ "<option value=\"GL\">(GL) Greenland</option>"
			+ "<option value=\"GD\">(GD) Grenada</option>"
			+ "<option value=\"GP\">(GP) Guadeloupe</option>"
			+ "<option value=\"GU\">(GU) Guam</option>"
			+ "<option value=\"GT\">(GT) Guatemala</option>"
			+ "<option value=\"GN\">(GN) Guinea</option>"
			+ "<option value=\"GW\">(GW) Guinea-Bissau</option>"
			+ "<option value=\"GY\">(GY) Guyana</option>"
			+ "<option value=\"HT\">(HT) Haiti</option>"
			+ "<option value=\"HM\">(HM) Heard and McDonald Islands</option>"
			+ "<option value=\"HN\">(HN) Honduras</option>"
			+ "<option value=\"HK\">(HK) Hong Kong</option>"
			+ "<option value=\"HU\">(HU) Hungary</option>"
			+ "<option value=\"IS\">(IS) Iceland</option>"
			+ "<option value=\"IN\">(IN) India</option>"
			+ "<option value=\"ID\">(ID) Indonesia</option>"
			+ "<option value=\"IR\">(IR) Iran</option>"
			+ "<option value=\"IQ\">(IQ) Iraq</option>"
			+ "<option value=\"IE\">(IE) Ireland</option>"
			+ "<option value=\"IL\">(IL) Israel</option>"
			+ "<option value=\"IT\">(IT) Italy</option>"
			+ "<option value=\"JM\">(JM) Jamaica</option>"
			+ "<option value=\"JP\">(JP) Japan</option>"
			+ "<option value=\"JO\">(JO) Jordan</option>"
			+ "<option value=\"KZ\">(KZ) Kazakhstan</option>"
			+ "<option value=\"KE\">(KE) Kenya</option>"
			+ "<option value=\"KI\">(KI) Kiribati</option>"
			+ "<option value=\"KP\">(KP) Korea (North)</option>"
			+ "<option value=\"KR\">(KR) Korea (South)</option>"
			+ "<option value=\"KW\">(KW) Kuwait</option>"
			+ "<option value=\"KG\">(KG) Kyrgyzstan</option>"
			+ "<option value=\"LA\">(LA) Laos</option>"
			+ "<option value=\"LV\">(LV) Latvia</option>"
			+ "<option value=\"LB\">(LB) Lebanon</option>"
			+ "<option value=\"LI\">(LI) Liechtenstein</option>"
			+ "<option value=\"LR\">(LR) Liberia</option>"
			+ "<option value=\"LY\">(LY) Libya</option>"
			+ "<option value=\"LS\">(LS) Lesotho</option>"
			+ "<option value=\"LT\">(LT) Lithuania</option>"
			+ "<option value=\"LU\">(LU) Luxembourg</option>"
			+ "<option value=\"MO\">(MO) Macau</option>"
			+ "<option value=\"MG\">(MG) Madagascar</option>"
			+ "<option value=\"MW\">(MW) Malawi</option>"
			+ "<option value=\"MY\">(MY) Malaysia</option>"
			+ "<option value=\"MV\">(MV) Maldives</option>"
			+ "<option value=\"ML\">(ML) Mali</option>"
			+ "<option value=\"MT\">(MT) Malta</option>"
			+ "<option value=\"MH\">(MH) Marshall Islands</option>"
			+ "<option value=\"MQ\">(MQ) Martinique</option>"
			+ "<option value=\"MR\">(MR) Mauritania</option>"
			+ "<option value=\"MU\">(MU) Mauritius</option>"
			+ "<option value=\"YT\">(YT) Mayotte</option>"
			+ "<option value=\"MX\">(MX) Mexico</option>"
			+ "<option value=\"FM\">(FM) Micronesia</option>"
			+ "<option value=\"MC\">(MC) Monaco</option>"
			+ "<option value=\"MD\">(MD) Moldova</option>"
			+ "<option value=\"MA\">(MA) Morocco</option>"
			+ "<option value=\"MN\">(MN) Mongolia</option>"
			+ "<option value=\"MS\">(MS) Montserrat</option>"
			+ "<option value=\"MZ\">(MZ) Mozambique</option>"
			+ "<option value=\"MM\">(MM) Myanmar</option>"
			+ "<option value=\"NA\">(NA) Namibia</option>"
			+ "<option value=\"NR\">(NR) Nauru</option>"
			+ "<option value=\"NP\">(NP) Nepal</option>"
			+ "<option value=\"NL\">(NL) Netherlands</option>"
			+ "<option value=\"AN\">(AN) Netherlands Antilles</option>"
			+ "<option value=\"NT\">(NT) Neutral Zone</option>"
			+ "<option value=\"NC\">(NC) New Caledonia</option>"
			+ "<option value=\"NZ\">(NZ) New Zealand (Aotearoa)</option>"
			+ "<option value=\"NI\">(NI) Nicaragua</option>"
			+ "<option value=\"NE\">(NE) Niger</option>"
			+ "<option value=\"NG\">(NG) Nigeria</option>"
			+ "<option value=\"NU\">(NU) Niue</option>"
			+ "<option value=\"NF\">(NF) Norfolk Island</option>"
			+ "<option value=\"MP\">(MP) Northern Mariana Islands</option>"
			+ "<option value=\"NO\">(NO) Norway</option>"
			+ "<option value=\"OM\">(OM) Oman</option>"
			+ "<option value=\"PK\">(PK) Pakistan</option>"
			+ "<option value=\"PW\">(PW) Palau</option>"
			+ "<option value=\"PA\">(PA) Panama</option>"
			+ "<option value=\"PG\">(PG) Papua New Guinea</option>"
			+ "<option value=\"PY\">(PY) Paraguay</option>"
			+ "<option value=\"PE\">(PE) Peru</option>"
			+ "<option value=\"PH\">(PH) Philippines</option>"
			+ "<option value=\"PN\">(PN) Pitcairn</option>"
			+ "<option value=\"PL\">(PL) Poland</option>"
			+ "<option value=\"PT\">(PT) Portugal</option>"
			+ "<option value=\"PR\">(PR) Puerto Rico</option>"
			+ "<option value=\"QA\">(QA) Qatar</option>"
			+ "<option value=\"RE\">(RE) Reunion</option>"
			+ "<option value=\"RO\">(RO) Romania</option>"
			+ "<option value=\"RU\">(RU) Russian Federation</option>"
			+ "<option value=\"RW\">(RW) Rwanda</option>"
			+ "<option value=\"GS\">(GS) S. Georgia and S. Sandwich Isls.</option>"
			+ "<option value=\"KN\">(KN) Saint Kitts and Nevis</option>"
			+ "<option value=\"LC\">(LC) Saint Lucia</option>"
			+ "<option value=\"VC\">(VC) Saint Vincent and the Grenadines</option>"
			+ "<option value=\"WS\">(WS) Samoa</option>"
			+ "<option value=\"SM\">(SM) San Marino</option>"
			+ "<option value=\"ST\">(ST) Sao Tome and Principe</option>"
			+ "<option value=\"SA\">(SA) Saudi Arabia</option>"
			+ "<option value=\"SN\">(SN) Senegal</option>"
			+ "<option value=\"SC\">(SC) Seychelles</option>"
			+ "<option value=\"SL\">(SL) Sierra Leone</option>"
			+ "<option value=\"SG\">(SG) Singapore</option>"
			+ "<option value=\"SI\">(SI) Slovenia</option>"
			+ "<option value=\"SK\">(SK) Slovak Republic</option>"
			+ "<option value=\"Sb\">(Sb) Solomon Islands</option>"
			+ "<option value=\"SO\">(SO) Somalia</option>"
			+ "<option value=\"ZA\">(ZA) South Africa</option>"
			+ "<option value=\"ES\">(ES) Spain</option>"
			+ "<option value=\"LK\">(LK) Sri Lanka</option>"
			+ "<option value=\"SH\">(SH) St. Helena</option>"
			+ "<option value=\"PM\">(PM) St. Pierre and Miquelon</option>"
			+ "<option value=\"SD\">(SD) Sudan</option>"
			+ "<option value=\"SR\">(SR) Suriname</option>"
			+ "<option value=\"SJ\">(SJ) Svalbard and Jan Mayen Islands</option>"
			+ "<option value=\"SZ\">(SZ) Swaziland</option>"
			+ "<option value=\"SE\">(SE) Sweden</option>"
			+ "<option value=\"CH\">(CH) Switzerland</option>"
			+ "<option value=\"SY\">(SY) Syria</option>"
			+ "<option value=\"TW\">(TW) Taiwan</option>"
			+ "<option value=\"TJ\">(TJ) Tajikistan</option>"
			+ "<option value=\"TZ\">(TZ) Tanzania</option>"
			+ "<option value=\"TH\">(TH) Thailand</option>"
			+ "<option value=\"TG\">(TG) Togo</option>"
			+ "<option value=\"TK\">(TK) Tokelau</option>"
			+ "<option value=\"TO\">(TO) Tonga</option>"
			+ "<option value=\"TT\">(TT) Trinidad and Tobago</option>"
			+ "<option value=\"TN\">(TN) Tunisia</option>"
			+ "<option value=\"TR\">(TR) Turkey</option>"
			+ "<option value=\"TM\">(TM) Turkmenistan</option>"
			+ "<option value=\"TC\">(TC) Turks and Caicos Islands</option>"
			+ "<option value=\"TV\">(TV) Tuvalu</option>"
			+ "<option value=\"UG\">(UG) Uganda</option>"
			+ "<option value=\"UA\">(UA) Ukraine</option>"
			+ "<option value=\"AE\">(AE) United Arab Emirates</option>"
			+ "<option value=\"UK\">(UK) United Kingdom</option>"
			+ "<option value=\"US\">(US) United States</option>"
			+ "<option value=\"UM\">(UM) US Minor Outlying Islands</option>"
			+ "<option value=\"UY\">(UY) Uruguay</option>"
			+ "<option value=\"SU\">(SU) USSR (former)</option>"
			+ "<option value=\"UZ\">(UZ) Uzbekistan</option>"
			+ "<option value=\"VU\">(VU) Vanuatu</option>"
			+ "<option value=\"VA\">(VA) Vatican City State (Holy See)</option>"
			+ "<option value=\"VE\">(VE) Venezuela</option>"
			+ "<option value=\"VN\">(VN) Viet Nam</option>"
			+ "<option value=\"VG\">(VG) Virgin Islands (British)</option>"
			+ "<option value=\"VI\">(VI) Virgin Islands (U.S.)</option>"
			+ "<option value=\"WF\">(WF) Wallis and Futuna Islands</option>"
			+ "<option value=\"EH\">(EH) Western Sahara</option>"
			+ "<option value=\"YE\">(YE) Yemen</option>"
			+ "<option value=\"YU\">(YU) Yugoslavia</option>"
			+ "<option value=\"ZM\">(ZM) Zambia</option>"
			+ "<option value=\"ZR\">(ZR) Zaire</option>"
			+ "<option value=\"ZW\">(ZW) Zimbabwe</option>";
	$("#countryName").html(countryNameOptions);
}

/**
 * Validate all entered values of bynca form
 * 
 * @returns {Boolean} return validation result
 */
function byncaValidateIndexPageForm() {
	/*
	 * Validation flag;
	 */
	var validationFlag = true;

	/*
	 * Country Name Validation
	 */
	var countryNameObj = $("#countryName");
	if ("" == countryNameObj.val()) {
		validationFlag = false;
		countryNameObj.closest("div").removeClass("has-success");
		countryNameObj.closest("div").addClass("has-error");
	} else {
		countryNameObj.closest("div").removeClass("has-error");
		countryNameObj.closest("div").addClass("has-success");
	}

	/*
	 * State Or Province Name Validation
	 */
	var stateOrProvinceNameObj = $("#stateOrProvinceName");
	if ("" == stateOrProvinceNameObj.val()) {
		validationFlag = false;
		stateOrProvinceNameObj.closest("div").removeClass("has-success");
		stateOrProvinceNameObj.closest("div").addClass("has-error");
	} else {
		stateOrProvinceNameObj.closest("div").removeClass("has-error");
		stateOrProvinceNameObj.closest("div").addClass("has-success");
	}

	/*
	 * Locality Name Validation
	 */
	var localityNameObj = $("#localityName");
	if ("" == localityNameObj.val()) {
		validationFlag = false;
		localityNameObj.closest("div").removeClass("has-success");
		localityNameObj.closest("div").addClass("has-error");
	} else {
		localityNameObj.closest("div").removeClass("has-error");
		localityNameObj.closest("div").addClass("has-success");
	}

	/*
	 * Organization Name Validation
	 */
	var organizationNameObj = $("#organizationName");
	if ("" == organizationNameObj.val()) {
		validationFlag = false;
		organizationNameObj.closest("div").removeClass("has-success");
		organizationNameObj.closest("div").addClass("has-error");
	} else {
		organizationNameObj.closest("div").removeClass("has-error");
		organizationNameObj.closest("div").addClass("has-success");
	}

	/*
	 * Organization Name Validation
	 */
	var organizationalUnitNameObj = $("#organizationalUnitName");
	if ("" == organizationalUnitNameObj.val()) {
		validationFlag = false;
		organizationalUnitNameObj.closest("div").removeClass("has-success");
		organizationalUnitNameObj.closest("div").addClass("has-error");
	} else {
		organizationalUnitNameObj.closest("div").removeClass("has-error");
		organizationalUnitNameObj.closest("div").addClass("has-success");
	}

	/*
	 * Common Name Validation
	 */
	var commonNameObj = $("#commonName");
	if ("" == commonNameObj.val()) {
		validationFlag = false;
		commonNameObj.closest("div").removeClass("has-success");
		commonNameObj.closest("div").addClass("has-error");
	} else {
		commonNameObj.closest("div").removeClass("has-error");
		commonNameObj.closest("div").addClass("has-success");
	}

	/*
	 * Email Address Validation
	 */
	var emailAddressObj = $("#emailAddress");
	if ("" == emailAddressObj.val()) {
		validationFlag = false;
		emailAddressObj.closest("div").removeClass("has-success");
		emailAddressObj.closest("div").addClass("has-error");
	} else {
		if (byncaEmailAddressValidation(emailAddressObj.val())) {
			emailAddressObj.closest("div").removeClass("has-error");
			emailAddressObj.closest("div").addClass("has-success");
		} else {
			validationFlag = false;
			emailAddressObj.closest("div").removeClass("has-success");
			emailAddressObj.closest("div").addClass("has-error");
		}
	}

	/*
	 * Key Password Validation
	 */
	var keyPasswordObj = $("#keyPassword");
	var keyPassword2Obj = $("#keyPassword2");

	if ("" == keyPasswordObj.val()) {
		validationFlag = false;
		keyPasswordObj.closest("div").removeClass("has-success");
		keyPasswordObj.closest("div").addClass("has-error");
	} else {
		keyPasswordObj.closest("div").removeClass("has-error");
		keyPasswordObj.closest("div").addClass("has-success");
	}

	if ("" == keyPassword2Obj.val()) {
		validationFlag = false;
		keyPassword2Obj.closest("div").removeClass("has-success");
		keyPassword2Obj.closest("div").addClass("has-error");
	} else {
		keyPassword2Obj.closest("div").removeClass("has-error");
		keyPassword2Obj.closest("div").addClass("has-success");
	}

	if (keyPasswordObj.val() != keyPassword2Obj.val()) {
		keyPasswordObj.closest("div").removeClass("has-success");
		keyPasswordObj.closest("div").addClass("has-error");

		keyPassword2Obj.closest("div").removeClass("has-success");
		keyPassword2Obj.closest("div").addClass("has-error");
	}

	/*
	 * Check validation flag
	 */
	// alert("validationFlag: " + validationFlag);
	if (validationFlag) {
		$('#submitFormButton').removeClass("disabled");
	}

	return validationFlag;
}

/**
 * submit bynca form
 * 
 * @returns {Boolean} return false always
 */
function byncaSubmitIndexPageForm() {
	$('#byncaForm').submit();
	return true;
}

/**
 * reset bynca form
 * 
 * @returns {Boolean}
 */
function byncaResetIndexPageForm() {

	/*
	 * Disable submit button
	 */
	$('#submitFormButton').addClass("disabled");

	/*
	 * Reset form, jQuery does not have reset() method for form
	 */
	document.getElementById("byncaForm").reset();

	/*
	 * Reset Country Name
	 */
	var countryNameObj = $("#countryName");
	countryNameObj.closest("div").removeClass("has-success");
	countryNameObj.closest("div").removeClass("has-error");

	/*
	 * Reset State Or Province Name
	 */
	var stateOrProvinceNameObj = $("#stateOrProvinceName");
	stateOrProvinceNameObj.closest("div").removeClass("has-success");
	stateOrProvinceNameObj.closest("div").removeClass("has-error");

	/*
	 * Reset Locality Name
	 */
	var localityNameObj = $("#localityName");
	localityNameObj.closest("div").removeClass("has-success");
	localityNameObj.closest("div").removeClass("has-error");

	/*
	 * Reset Organization Name
	 */
	var organizationNameObj = $("#organizationName");
	organizationNameObj.closest("div").removeClass("has-success");
	organizationNameObj.closest("div").removeClass("has-error");

	/*
	 * Reset Organization Name
	 */
	var organizationalUnitNameObj = $("#organizationalUnitName");
	organizationalUnitNameObj.closest("div").removeClass("has-success");
	organizationalUnitNameObj.closest("div").removeClass("has-error");

	/*
	 * Reset Common Name
	 */
	var commonNameObj = $("#commonName");
	commonNameObj.closest("div").removeClass("has-success");
	commonNameObj.closest("div").removeClass("has-error");

	/*
	 * Reset Email Address
	 */
	var emailAddressObj = $("#emailAddress");
	emailAddressObj.closest("div").removeClass("has-success");
	emailAddressObj.closest("div").removeClass("has-error");

	/*
	 * Reset Key Password
	 */
	var keyPasswordObj = $("#keyPassword");
	keyPasswordObj.closest("div").removeClass("has-success");
	keyPasswordObj.closest("div").removeClass("has-error");

	/*
	 * Reset Key Password Again
	 */
	var keyPassword2Obj = $("#keyPassword2");
	keyPassword2Obj.closest("div").removeClass("has-success");
	keyPassword2Obj.closest("div").removeClass("has-error");

	return false;
}