<?php

namespace com\bornayuan\turtleshell\storage\operator;

use com\bornayuan\turtleshell\storage\entity\UserBasicEntity;

/**
 *
 * @author borna
 *        
 */
class UserBasicOperator extends GenericOperator {
	
	/**
	 * Constructor
	 *
	 * @param \com\bornayuan\turtleshell\storage\database\DatabaseConnector $databaseConnector
	 */
	public function __construct($databaseConnector) {
		parent::__construct ( 'UserBasicOperator', $databaseConnector );
	}
	
	/**
	 * Create UserBasicEntity
	 *
	 * @return \com\bornayuan\turtleshell\storage\entity\UserBasicEntity
	 */
	public function create($ubEntity) {
		$sql = '';
		
		// $ubEntity = new UserBasicEntity();
		
		return $ubEntity;
	}
	
	/**
	 * Load single entity by primary key.
	 *
	 * @param string $id
	 *        	Primary key
	 * @return \com\bornayuan\turtleshell\storage\entity\UserBasicEntity|NULL
	 */
	public function load($id) {
		$sql = 'SELECT * FROM TS_USER_BASIC WHERE ID=' . $id;
		
		$this->getDatabaseConnector ()->beginTransaction ();
		$result = mysqli_query ( $this->getDatabaseConnector ()->getDatabaseConnection (), $sql );
		$this->getDatabaseConnector ()->endTransaction ();
		
		if ($result) {
			/*
			 * Found result(s).
			 */
			$rowCountNumber = mysqli_num_rows ( $result );
			if ($rowCountNumber == 1) {
				$row = mysqli_fetch_assoc ( $result );
				$ubEntity = new UserBasicEntity ();
				$ubEntity->setId ( $row ['id'] );
				$ubEntity->setFirstName ( $row ['first_name'] );
				$ubEntity->setMiddleName ( $row ['middle_name'] );
				$ubEntity->setLastName ( $row ['last_name'] );
				$ubEntity->setNickName ( $row ['nick_name'] );
				$ubEntity->setEmail ( $row ['email'] );
				$ubEntity->setUniqueIdentity ( $row ['unique_identity'] );
				return $ubEntity;
			} elseif ($rowCountNumber > 1) {
				/*
				 * More than one results
				 */
				echo (' <font color="#FF0000">TurtleShell, UserBasicOperator->load(): Warning: found more than one results!</font> ');
				return null;
			} elseif ($rowCountNumber <= 0) {
				/*
				 * This scenario maybe will not be happend.
				 */
				echo (' <font color="#FF0000">TurtleShell, UserBasicOperator->load(): Warning: cannot find any result!</font> ');
				return null;
			}
		} else {
			echo (' <font color="#FF0000">TurtleShell, UserBasicOperator->load(): Warning: cannot find any result!</font> ');
			return null;
		}
	}
	
	/**
	 * Find UserBasicEntity by condition, which should be a formated sql script.
	 *
	 * @param string $condition
	 * @return array UserBasicEntities|NULL
	 *        
	 */
	public function find($querySql) {
		$this->getDatabaseConnector ()->beginTransaction ();
		$result = mysqli_query ( $this->getDatabaseConnector ()->getDatabaseConnection (), $querySql );
		$this->getDatabaseConnector ()->endTransaction ();
		
		$ubEntities = [ ];
		
		if ($result) {
			/*
			 * There are results
			 */
			if (mysqli_num_rows ( $result ) > 0) {
				$ubEntity = new UserBasicEntity ();
				while ( $rowData = mysqli_fetch_assoc ( $result ) ) {
					$ubEntities [] = OperatorUtility::buildEntityFromQueriedRowData ( $ubEntity, $rowData );
				}
				
				return $ubEntities;
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