<?php

namespace objectlibrary\storage\operator;

require constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/GenericOperator.php';

use objectlibrary\storage\entity\UserAuthEntity;

/**
 *
 * @author borna
 *        
 */
class UserAuthOperator extends GenericOperator {
	
	/**
	 * Constructor
	 *
	 * @param object $databaseConnection
	 */
	public function __construct($databaseConnection) {
		parent::__construct ( $databaseConnection );
	}
	
	/**
	 * Find UserAuthEntity by username and password.
	 *
	 * @param string $username
	 * @param string $password
	 * @return \objectlibrary\storage\entity\UserAuthEntity
	 */
	public function findByUsernameAndPassword($username, $password) {
		$sql = 'SELECT * FROM TS_USER_AUTH WHERE USERNAME=' . $username . ' AND PASSWORD=' . $password;
		
		$uae = new UserAuthEntity ();
		
		return $uae;
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see \objectlibrary\storage\operator\IGenericOperator::getName()
	 *
	 */
	public function getName() {
		return 'UserAuthOperator';
	}
}

