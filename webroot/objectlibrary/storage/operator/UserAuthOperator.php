<?php

namespace objectlibrary\storage\operator;

require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/GenericOperator.php';
require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/entity/UserAuthEntity.php';

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
		parent::__construct ( 'UserAuthOperator', $databaseConnection );
	}
	
	/**
	 * Find UserAuthEntity by username and password.
	 *
	 * @param string $username
	 * @param string $password
	 * @return \objectlibrary\storage\entity\UserAuthEntity
	 */
	public function findByUsernameAndPassword($username, $password) {
		$sql = 'SELECT * FROM TS_USER_AUTH WHERE USERNAME="' . $username . '" AND PASSWORD="' . $password . '"';
		
		$result = mysqli_query ( $this->getDatabaseConnection (), $sql );
		
		if ($result) {
			/*
			 * There are results
			 */
			if (mysqli_num_rows ( $result ) > 0) {
				$uae = new UserAuthEntity ();
				while ( $row = mysqli_fetch_assoc ( $result ) ) {
					$uae->setId ( intval ( $row ['id'] ) );
					$uae->setUserBasicId ( intval ( $row ['user_basic_id'] ) );
					$uae->setUsername ( $row ['username'] );
					$uae->setPassword ( $row ['password'] );
				}
				return $uae;
			} else {
				/*
				 * The result is not null/false, but its length is zero. Maybe this scenario will not be happend.
				 */
				return null;
			}
		} else {
			/*
			 * There is no result.
			 */
			return null;
		}
	}
}

?>