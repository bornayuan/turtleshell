<?php

namespace com\bornayuan\turtleshell\storage\operator;

use com\bornayuan\turtleshell\storage\entity\UserAuthEntity;

/**
 *
 * @author borna
 *        
 */
class UserAuthOperator extends GenericOperator {
	
	/**
	 * Constructor
	 *
	 * @param \com\bornayuan\turtleshell\storage\database\DatabaseConnector $databaseConnector
	 */
	public function __construct($databaseConnector) {
		parent::__construct ( 'UserAuthOperator', $databaseConnector );
	}
	
	/**
	 * Find UserAuthEntity by username and password.
	 *
	 * @param string $username
	 * @param string $password
	 * @return \com\bornayuan\turtleshell\storage\entity\UserAuthEntity
	 */
	public function findByUsernameAndPassword($username, $password) {
		$sql = 'SELECT * FROM TS_USER_AUTH WHERE USERNAME="' . $username . '" AND PASSWORD="' . $password . '"';
		
		$this->getDatabaseConnector ()->beginTransaction ();
		$result = mysqli_query ( $this->getDatabaseConnector ()->getDatabaseConnection (), $sql );
		$this->getDatabaseConnector ()->endTransaction ();
		
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
	
	/**
	 * Find UserAuthEntity by condition, which should be a formated sql script.
	 *
	 * @param string $condition
	 * @return array UserAuthEntities|NULL
	 *        
	 */
	public function find($condition) {
		$sql = 'SELECT * FROM TS_USER_AUTH WHERE 1=1 ' . $condition;
		
		$this->getDatabaseConnector ()->beginTransaction ();
		$result = mysqli_query ( $this->getDatabaseConnector ()->getDatabaseConnection (), $sql );
		$this->getDatabaseConnector ()->endTransaction ();
		
		$uaEntities = array ();
		
		if ($result) {
			/*
			 * There are results
			 */
			if (mysqli_num_rows ( $result ) > 0) {
				$uaEntity = new UserAuthEntity ();
				while ( $row = mysqli_fetch_assoc ( $result ) ) {
					$uaEntity->setId ( $row ['id'] );
					$uaEntity->setUsername ( $row ['username'] );
					$ubEntity->setPassword ( $row ['password'] );
					
					$uaEntities [] = $uaEntity;
				}
				
				return $uaEntities;
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