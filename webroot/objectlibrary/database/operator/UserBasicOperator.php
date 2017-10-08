<?php

namespace objectlibrary\database\operator;

use objectlibrary\database\entity\UserBasicEntity;
use objectlibrary\DatabaseUtility;

/**
 *
 * @author borna
 *        
 */
class UserBasicOperator extends GenericOperator {
	
	/**
	 */
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * Load single entity by primary key.
	 *
	 * @param int $id
	 * @return \objectlibrary\database\entity\UserBasicEntity
	 */
	public function loadById(int $id) {
		$sql = 'SELECT * FROM TS_USER_BASIC WHERE ID=' . $id;
		print ('SQL: ' . $sql . '</br>') ;
		
		$du = new DatabaseUtility ();
		$ube = new UserBasicEntity ();
		
		$conn = $du->getConnection ();
		
		$result = mysqli_query ( $conn, $sql );
		if ($result) {
			print ('Query database successfully</br>') ;
			
			if (mysqli_num_rows ( $result ) > 0) {
				while ( $row = mysqli_fetch_assoc ( $result ) ) {
					$ube->setId ( $row ['id'] );
					$ube->setFirstName ( $row ['first_name'] );
					$ube->setMiddleName ( $row ['middle_name'] );
					$ube->setLastName ( $row ['last_name'] );
					$ube->setNickName ( $row ['nick_name'] );
					$ube->setEmail ( $row ['email'] );
					$ube->setUniqueIdentity ( $row ['unique_identity'] );
				}
				
				return $ube;
			} else {
				print ('Do not find any data from database</br>') ;
				return null;
			}
		} else {
			print ("Query database failed</br>") ;
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

