<?php

namespace com\bornayuan\turtleshell\template;

require_once constant ( 'ABSPATH' ) . '/com/bornayuan/turtleshell/template/element/Header.php';
require_once constant ( 'ABSPATH' ) . '/com/bornayuan/turtleshell/template/element/Container.php';
require_once constant ( 'ABSPATH' ) . '/com/bornayuan/turtleshell/template/element/Footer.php';

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
		$headerContent = $header->getHeader ( TS__TEMPLATE__SIGN_IN );
		
		$container = new Container ();
		$containerContent = $container->getContainer ( TS__TEMPLATE__SIGN_IN );
		
		$footer = new Footer ();
		$footerContent = $footer->getFooter ( TS__TEMPLATE__SIGN_IN );
		
		return $headerContent . $containerContent . $footerContent;
	}
}

