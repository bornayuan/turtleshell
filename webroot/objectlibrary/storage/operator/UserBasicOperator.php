<?php

namespace objectlibrary\storage\operator;

use objectlibrary\storage\entity\UserBasicEntity;

require constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/GenericOperator.php';

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
	 * @param int $id
	 * @return \objectlibrary\storage\entity\UserBasicEntity
	 */
	public function loadById($id) {
		$sql = 'SELECT * FROM TS_USER_BASIC WHERE ID=' . $id;
		// print ('SQL: ' . $sql . '</br>') ;
		
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
	 * @see \objectlibrary\storage\operator\IGenericOperator::getName()
	 */
	public function getName() {
		return 'UserBasicOperator';
	}
}

