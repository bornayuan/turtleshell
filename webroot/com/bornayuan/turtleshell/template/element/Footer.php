<?php

namespace com\bornayuan\turtleshell\template\element;

/**
 *
 * @author borna
 *        
 */
class Footer {
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Get default footer
	 *
	 * @return string
	 */
	public function getDefaultFooter() {
		$defaultFooterContent = '';
		$defaultFooterContent = $defaultFooterContent . file_get_contents ( constant ( 'ABSPATH' ) . '/objectlibrary/template/element/BoostrapScript.php' );
		$defaultFooterContent = $defaultFooterContent . '</body>' . "\r\n";
		$defaultFooterContent = $defaultFooterContent . '</html>' . "\r\n";
		
		return $defaultFooterContent;
	}
	
	/**
	 * Get template according to the name
	 *
	 * @param string $templateName
	 * @return string partial foot HTML code
	 */
	public function getFooter($templateName) {
		$footerContent = '';
		$footerContent = $footerContent . file_get_contents ( constant ( 'ABSPATH' ) . '/objectlibrary/template/element/BoostrapScript.php' );
		
		if (TS__TEMPLATE__SIGN_IN == $templateName) {
			$footerContent = $footerContent . '<script type="text/javascript">' . "\r\n";
			$footerContent = $footerContent . '  initializeSignInPage();' . "\r\n";
			$footerContent = $footerContent . '</script>' . "\r\n";
		}
		
		$footerContent = $footerContent . '</body>' . "\r\n";
		$footerContent = $footerContent . '</html>' . "\r\n";
		
		return $footerContent;
	}
}

?>