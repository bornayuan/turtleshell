<?php

namespace objectlibrary\storage;

require constant ( 'ABSPATH' ) . '/objectlibrary/storage/DatabaseConnector.php';
require constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/UserBasicOperator.php';

use objectlibrary\storage\operator\UserBasicOperator;

/**
 *
 * @author borna
 *        
 */
class StorageManager {
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Load UserBasicEntity by id which is primary key
	 *
	 * @param int $id
	 * @return \objectlibrary\storage\entity\UserBasicEntity
	 */
	public function loadUserBadic($id) {
		$dbConnector = new DatabaseConnector ();
		$dbConnector->initialize ();
		
		$ubOperator = new UserBasicOperator ( $dbConnector->getDatabaseConnection () );
		
		$dbConnector->beginTransaction ();
		$ubEntity = $ubOperator->loadById ( $id );
		$dbConnector->endTransaction ();
		
		return $ubEntity;
	}
}

?>