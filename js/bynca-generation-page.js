/**
 * Initialize all necessary methods, and this method will be called by web page
 * loading.
 */
function byncaInitializeGenerationPage() {
	byncaInitializeGenerationPageEvents();
}

function byncaInitializeGenerationPageEvents() {
	$("#byncaRootCertificatesLink").popover();
	$("#byncaGenerationFirstStepLink").popover();
}