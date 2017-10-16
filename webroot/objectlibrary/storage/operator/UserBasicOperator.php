<?php

namespace objectlibrary\storage\operator;

require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/GenericOperator.php';
require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/entity/UserBasicEntity.php';

use objectlibrary\storage\entity\UserBasicEntity;

/**
 *
 * @author borna
 *        
 */
class UserBasicOperator extends GenericOperator {
	
	/**
	 * Constructor
	 *
	 * @param object $databaseConnection
	 */
	public function __construct($databaseConnection) {
		parent::__construct ( 'UserBasicOperator', $databaseConnection );
	}
	
	/**
	 * Create UserBasicEntity,
	 * @return \objectlibrary\storage\entity\UserBasicEntity
	 */
	public function create($ubEntity) {
		$sql = '';
		
		// $ubEntity = new UserBasicEntity();
		
		
		return $ubEntity;
	}
	
	/**
	 * Load single entity by primary key.
	 *
	 * @param int $id
	 * @return \objectlibrary\storage\entity\UserBasicEntity
	 */
	public function loadById($id) {
		$sql = 'SELECT * FROM TS_USER_BASIC WHERE ID=' . $id;
		
		$result = mysqli_query ( $this->getDatabaseConnection (), $sql );
		
		if ($result) {
			/*
			 * There are results.
			 */
			if (mysqli_num_rows ( $result ) > 0) {
				$ube = new UserBasicEntity ();
				while ( $row = mysqli_fetch_assoc ( $result ) ) {
					$ube->setId ( intval ( $row ['id'] ) );
					$ube->setFirstName ( $row ['first_name'] );
					$ube->setMiddleName ( $row ['middle_name'] );
					$ube->setLastName ( $row ['last_name'] );
					$ube->setNickName ( $row ['nick_name'] );
					$ube->setEmail ( $row ['email'] );
					$ube->setUniqueIdentity ( $row ['unique_identity'] );
				}
				return $ube;
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