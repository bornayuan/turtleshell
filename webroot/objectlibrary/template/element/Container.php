<?php

namespace objectlibrary\template\element;

/**
 *
 * @author borna
 *        
 */
class Container {
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Get container
	 *
	 * @param string $containerName,
	 *        	predefined name.
	 * @return NULL|string
	 */
	public function getContainer($templateName) {
		
		/*
		 * Container Header
		 */
		$containerHeader = '';
		$containerHeader = $containerHeader . '<div class="container" style="padding-top: 60px">' . "\r\n";
		$containerHeader = $containerHeader . '  <form id="byncaForm" name="tsForm" method="post" action="">' . "\r\n";
		
		/*
		 * Container Footer
		 */
		$containerFooter = '';
		$containerFooter = $containerFooter . '  </form>' . "\r\n";
		$containerFooter = $containerFooter . '</div>' . "\r\n";
		
		if ($templateName == null || $templateName == '') {
			$defaultPanel = $this->getPanelA ( 'Warning', 'The template name should not be null!' );
			return $containerHeader . $defaultPanel . $containerFooter;
		} elseif (TS__TEMPLATE__SIGN_IN == $templateName) {
			/*
			 * Panel - Sign In
			 */
			$signInPanel = $this->getSignInPanle ();
			return $containerHeader . $signInPanel . $containerFooter;
		} else {
			$defaultPanel = $this->getPanelA ( 'Warning', 'The template name is invalid!' );
			return $containerHeader . $defaultPanel . $containerFooter;
		}
	}
	
	/**
	 * Get SignInPanel
	 *
	 * @return string, SignInPanel HTML code
	 */
	private function getSignInPanle() {
		$panelTitle = 'Sign In';
		$usernameLabel = 'Username';
		$usernameContent = '';
		$usernameContent = $usernameContent . '<input type="text" id="signInUsername" name="signInUsername" maxlength="60" class="form-control" placeholder="SignInUsername" aria-describedby="signInUsernameAddOn" title="Username" data-content="Max length is 60 letters" data-toggle="popover" data-placement="top" data-trigger="hover" />' . "\r\n";
		$usernameContent = $usernameContent . '<span id="signInUsernameAddOn" class="input-group-addon"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span></span>' . "\r\n";
		
		$passwordLabel = 'Password';
		$passwordContent = '';
		$passwordContent = $passwordContent . '<input type="password" id="signInPassword" name="signInPassword" maxlength="60" class="form-control" placeholder="SignInPassword" aria-describedby="signInPasswordAddOn" title="Password" data-content="Max length is 60 letters" data-toggle="popover" data-placement="top" data-trigger="hover" />' . "\r\n";
		$passwordContent = $passwordContent . '<span id="signInPasswordAddOn" class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>' . "\r\n";
		
		$signInPanelContents = array (
				array (
						$usernameLabel,
						$usernameContent 
				),
				array (
						$passwordLabel,
						$passwordContent 
				) 
		);
		
		return $this->getPanelB ( $panelTitle, $signInPanelContents, false );
	}
	
	/**
	 * Get PanelD, which includes panel title and four-columns table.
	 * Structure:
	 * |-title
	 * |-table
	 * |-Column0(md2), Column1(md4), Column2(md2), Column3(md4)
	 * |-Column0(md2), Column1(md4), Column2(md2), Column3(md4)
	 * |-Column0(md2), Column1(md4), Column2(md2), Column3(md4)
	 * ...
	 *
	 * @param string $panelTitle
	 * @param array $panelContents,
	 *        	the content is a two-dimension array, and it must be matched with the structure of four-columns table.
	 * @return string, PanleB HTML content
	 */
	private function getPanelD($panelTitle, $panelContents) {
		/*
		 * Panel Head
		 */
		$panelHead = '';
		$panelHead = $panelHead . '<div class="panel panel-default">' . "\r\n";
		$panelHead = $panelHead . '  <div class="panel-heading">' . "\r\n";
		$panelHead = $panelHead . '    <h3 class="panel-title">' . $panelTitle . '</h3>' . "\r\n";
		$panelHead = $panelHead . '  </div>' . "\r\n";
		
		/*
		 * Panel Foot
		 */
		$panelFoot = '';
		$panelFoot = $panelFoot . '</div>' . "\r\n";
		
		/*
		 * Panel Body
		 * Open PanelBody div tag
		 */
		$panelBody = '';
		$panelBody = $panelBody . '<div class="panel-body">' . "\r\n";
		
		if (is_array ( $panelContents )) {
			
			$rowCountNumber = count ( $panelContents, COUNT_NORMAL );
			
			for($i = 0; $i < $rowCountNumber; $i ++) {
				
				/*
				 * Open row div tag
				 */
				$panelBody = $panelBody . '<div class="row">' . "\r\n";
				
				if (is_array ( $panelContents [$i] )) {
					
					$columnCountNumber = count ( $panelContents [$i], COUNT_NORMAL );
					
					if ($columnCountNumber != 4) {
						// not four-columns
						continue;
					} else {
						$column0Content = $panelContents [$i] [0];
						$column1Content = $panelContents [$i] [1];
						$column2Content = $panelContents [$i] [2];
						$column3Content = $panelContents [$i] [3];
						
						$panelBody = $panelBody . '<div class="col-md-2 form-group">' . "\r\n";
						$panelBody = $panelBody . '  <label class="control-label" for="countryName">' . $column0Content . '</label>' . "\r\n";
						$panelBody = $panelBody . '</div>' . "\r\n";
						
						$panelBody = $panelBody . '<div class="col-md-4 form-group">' . "\r\n";
						$panelBody = $panelBody . '	 <div class="input-group">' . $column1Content . '</div>' . "\r\n";
						$panelBody = $panelBody . '</div>' . "\r\n";
						
						$panelBody = $panelBody . '<div class="col-md-2 form-group">' . "\r\n";
						$panelBody = $panelBody . '  <label class="control-label" for="countryName">' . $column2Content . '</label>' . "\r\n";
						$panelBody = $panelBody . '</div>' . "\r\n";
						
						$panelBody = $panelBody . '<div class="col-md-4 form-group">' . "\r\n";
						$panelBody = $panelBody . '	 <div class="input-group">' . $column3Content . '</div>' . "\r\n";
						$panelBody = $panelBody . '</div>' . "\r\n";
					}
				} else {
					// $panelContents [i] is not an array
				}
				
				/*
				 * Close row div tag
				 */
				$panelBody = $panelBody . '</div>' . "\r\n";
			}
		} else {
			// $panelContents is not an array
			$panelBody = $panelBody . '<div class="row">' . "\r\n";
			$panelBody = $panelBody . '  <div class="col-md-12 form-group">' . "\r\n";
			$panelBody = $panelBody . '    <label class="control-label" for="countryName">There is not any content</label>' . "\r\n";
			$panelBody = $panelBody . '  </div>' . "\r\n";
			$panelBody = $panelBody . '</div>' . "\r\n";
		}
		
		/*
		 * Close PanelBody div tag
		 */
		$panelBody = $panelBody . '</div>' . "\r\n";
		
		/*
		 * Return PanelD full HTML content.
		 */
		return $panelHead . $panelBody . $panelFoot;
	}
	
	/**
	 * Get PanelB, which includes panel title and two-columns table.
	 * Structure:
	 * |-title
	 * |-table
	 * |-Column0(md2), Column1(md4/md10)
	 * |-Column0(md2), Column1(md4/md10)
	 * |-Column0(md2), Column1(md4/md10)
	 * ...
	 *
	 * @param string $panelTitle
	 * @param array $panelContents,
	 *        	the content is a two-dimension array, and it must be matched with the structure of two-columns table.
	 * @param boolean $isFullWidth,
	 *        	true: 12 columns full width, false: 6 columns width.
	 * @return string, PanleB HTML content
	 */
	private function getPanelB($panelTitle, $panelContents, $isFullWidth) {
		/*
		 * Panel Head
		 */
		$panelHead = '';
		$panelHead = $panelHead . '<div class="panel panel-default">' . "\r\n";
		$panelHead = $panelHead . '  <div class="panel-heading">' . "\r\n";
		$panelHead = $panelHead . '    <h3 class="panel-title">' . $panelTitle . '</h3>' . "\r\n";
		$panelHead = $panelHead . '  </div>' . "\r\n";
		
		/*
		 * Panel Foot
		 */
		$panelFoot = '';
		$panelFoot = $panelFoot . '</div>' . "\r\n";
		
		/*
		 * Panel Body
		 * Open PanelBody div tag
		 */
		$panelBody = '';
		$panelBody = $panelBody . '<div class="panel-body">' . "\r\n";
		
		if (is_array ( $panelContents )) {
			
			$rowCountNumber = count ( $panelContents, COUNT_NORMAL );
			
			for($i = 0; $i < $rowCountNumber; $i ++) {
				
				/*
				 * Open row div tag
				 */
				$panelBody = $panelBody . '<div class="row">' . "\r\n";
				
				if (is_array ( $panelContents [$i] )) {
					
					$columnCountNumber = count ( $panelContents [$i], COUNT_NORMAL );
					
					if ($columnCountNumber != 2) {
						// not two-columns
						continue;
					} else {
						$column0Content = $panelContents [$i] [0];
						$column1Content = $panelContents [$i] [1];
						
						$panelBody = $panelBody . '<div class="col-md-2 form-group">' . "\r\n";
						$panelBody = $panelBody . '  <label class="control-label" for="countryName">' . $column0Content . '</label>' . "\r\n";
						$panelBody = $panelBody . '</div>' . "\r\n";
						
						if ($isFullWidth) {
							$panelBody = $panelBody . '<div class="col-md-10 form-group">' . "\r\n";
						} else {
							$panelBody = $panelBody . '<div class="col-md-4 form-group">' . "\r\n";
						}
						$panelBody = $panelBody . '	 <div class="input-group">' . $column1Content . '</div>' . "\r\n";
						$panelBody = $panelBody . '</div>' . "\r\n";
					}
				} else {
					// $panelContents [i] is not an array
				}
				
				/*
				 * Close row div tag
				 */
				$panelBody = $panelBody . '</div>' . "\r\n";
			}
		} else {
			// $panelContents is not an array
			$panelBody = $panelBody . '<div class="row">' . "\r\n";
			$panelBody = $panelBody . '  <div class="col-md-12 form-group">' . "\r\n";
			$panelBody = $panelBody . '    <label class="control-label" for="countryName">There is not any content</label>' . "\r\n";
			$panelBody = $panelBody . '  </div>' . "\r\n";
			$panelBody = $panelBody . '</div>' . "\r\n";
		}
		
		/*
		 * Close PanelBody div tag
		 */
		$panelBody = $panelBody . '</div>' . "\r\n";
		
		/*
		 * Return PanelD full HTML content.
		 */
		return $panelHead . $panelBody . $panelFoot;
	}
	
	/**
	 * Get PanelA, which includes panel title and content only.
	 *
	 * @param string $panelTitle,
	 *        	Panel title with HTML tags.
	 * @param string $panelContent,
	 *        	Panel content with HTML tags.
	 *        	
	 * @return string, PanleA HTML content
	 */
	private function getPanelA($panelTitle, $panelContent) {
		/*
		 * Panel Head
		 */
		$panelHead = '';
		$panelHead = $panelHead . '<div class="panel panel-default">' . "\r\n";
		$panelHead = $panelHead . '  <div class="panel-heading">' . "\r\n";
		$panelHead = $panelHead . '    <h3 class="panel-title">' . $panelTitle . '</h3>' . "\r\n";
		$panelHead = $panelHead . '  </div>' . "\r\n";
		
		/*
		 * Panel Body
		 */
		$panelBody = '';
		$panelBody = $panelBody . '  <div class="panel-body bg-info">' . $panelContent . '</div>' . "\r\n";
		
		/*
		 * Panel Foot
		 */
		$panelFoot = '';
		$panelFoot = $panelFoot . '</div>' . "\r\n";
		
		/*
		 * Return PanelB full HTML content.
		 */
		return $panelHead . $panelBody . $panelFoot;
	}
}

?>