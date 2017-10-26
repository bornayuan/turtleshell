<?php

namespace com\bornayuan\turtleshell\template;

use com\bornayuan\turtleshell\ConfigurationManager;
use com\bornayuan\turtleshell\template\element\Container;
use com\bornayuan\turtleshell\template\element\Footer;
use com\bornayuan\turtleshell\template\element\Header;

/**
 *
 * @author borna
 *        
 */
class TemplateGenerator {
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Get SignInTemplate
	 * 
	 * @return string full SignInTemplate HTML code
	 */
	public function getSignInTemplate() {
		$header = new Header ();
		$headerContent = $header->getHeader ( ConfigurationManager::$TS__TEMPLATE__SIGN_IN );
		
		$container = new Container ();
		$containerContent = $container->getContainer ( ConfigurationManager::$TS__TEMPLATE__SIGN_IN );
		
		$footer = new Footer ();
		$footerContent = $footer->getFooter ( ConfigurationManager::$TS__TEMPLATE__SIGN_IN );
		
		return $headerContent . $containerContent . $footerContent;
	}
}

