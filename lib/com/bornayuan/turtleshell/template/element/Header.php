<?php

namespace com\bornayuan\turtleshell\template\element;

/**
 *
 * @author borna
 *        
 */
class Header {
	private $pageTitle = 'TurtleShell';
	
	/**
	 *
	 * @return mixed
	 */
	public function getPageTitle() {
		return $this->pageTitle;
	}
	
	/**
	 *
	 * @param mixed $pageTitle
	 */
	public function setPageTitle($pageTitle) {
		$this->pageTitle = $pageTitle;
	}
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Get default header
	 * 
	 * @return string
	 */
	public function getDefaultHeader() {
		$defaultHeaderContent = '';
		$defaultHeaderContent = $defaultHeaderContent . '<!DOCTYPE html>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '<html lang="en">' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '<head>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <title>' . $this->getPageTitle () . '</title>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <meta charset="UTF-8" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <meta http-equiv="X-UA-Compatible" content="IE=edge" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <meta name="viewport" content="width=device-width, initial-scale=1" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <link href="/css/bootstrap.min.css" rel="stylesheet" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . file_get_contents ( constant ( 'ABSPATH' ) . '/objectlibrary/template/element/InternetExplorerCompatibleScript.php' );
		$defaultHeaderContent = $defaultHeaderContent . '</head>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '<body>' . "\r\n";
		
		return $defaultHeaderContent;
	}
	
	public function getHeader($templateName) {
		$defaultHeaderContent = '';
		$defaultHeaderContent = $defaultHeaderContent . '<!DOCTYPE html>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '<html lang="en">' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '<head>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <title>' . $this->getPageTitle () . '</title>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <meta charset="UTF-8" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <meta http-equiv="X-UA-Compatible" content="IE=edge" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <meta name="viewport" content="width=device-width, initial-scale=1" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '  <link href="/css/bootstrap.min.css" rel="stylesheet" />' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . file_get_contents ( constant ( 'ABSPATH' ) . '/objectlibrary/template/element/InternetExplorerCompatibleScript.php' );
		$defaultHeaderContent = $defaultHeaderContent . '</head>' . "\r\n";
		$defaultHeaderContent = $defaultHeaderContent . '<body>' . "\r\n";
		
		return $defaultHeaderContent;
	}
}

?>