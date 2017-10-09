<?php

namespace objectlibrary\database\operator;

require constant ( 'ABSPATH' ) . '/objectlibrary/database/operator/GenericOperator.php';

use objectlibrary\database\entity\UserBasicEntity;
use objectlibrary\DatabaseUtility;

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
		parent::__construct ( $databaseConnection );
	}
	
	/**
	 * Load single entity by primary key.
	 *
	 * @param mixed $id
	 * @return \objectlibrary\database\entity\UserBasicEntity
	 */
	public function loadById($id) {
		$sql = 'SELECT * FROM TS_USER_BASIC WHERE ID=' . $id;
		// print ('SQL: ' . $sql . '</br>') ;
		
		$du = new DatabaseUtility ();
		$ube = new UserBasicEntity ();
		
		$result = mysqli_query ( $this->getDatabaseConnection (), $sql );
		if ($result) {
			// print ('Query database successfully</br>') ;
			
			if (mysqli_num_rows ( $result ) > 0) {
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
				// print ('Do not find any data from database</br>') ;
				return null;
			}
		} else {
			// print ("Query database failed</br>") ;
			return null;
		}
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \objectlibrary\database\operator\IGenericOperator::getName()
	 */
	public function getName() {
		return 'UserBasicOperator';
	}
}

