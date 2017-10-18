<?php

namespace com\bornayuan\turtleshell\storage;

require_once ABSPATH . '/com/bornayuan/turtleshell/storage/database/DatabaseConnector.php';
require_once ABSPATH . '/com/bornayuan/turtleshell/storage/entity/UserBasicEntity.php';
require_once ABSPATH . '/com/bornayuan/turtleshell/storage/entity/EntityUtility.php';
require_once ABSPATH . '/com/bornayuan/turtleshell/storage/operator/UserBasicOperator.php';
require_once ABSPATH . '/com/bornayuan/turtleshell/storage/operator/OperatorUtility.php';

use com\bornayuan\turtleshell\storage\operator\OperatorUtility;
use com\bornayuan\turtleshell\storage\operator\UserBasicOperator;

/**
 *
 * @author borna
 *        
 */
class StorageService {
	
	/**
	 * Constructor
	 */
	public function __construct() {
	}
	
	/**
	 * Load UserBasicEntity
	 *
	 * @param int $id
	 *        	Primary key
	 * @return \com\bornayuan\turtleshell\storage\entity\UserBasicEntity
	 */
	public function loadUserBasicEntity($id) {
		$ubOperator = new UserBasicOperator ();
		return $ubOperator->load ( $id );
	}
	
	/**
	 * Find UserBasicEntities
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\UserBasicEntity $ubEntity
	 * @return array UserBasicEntities
	 */
	public function findUserBasicEntities($ubEntity) {
		$condition = OperatorUtility::buildCondition ( $ubEntity );
		$ubOperator = new UserBasicOperator ( null );
		$ubEntities = $ubOperator->find ( $condition );
		
		return $ubEntities;
	}
}

