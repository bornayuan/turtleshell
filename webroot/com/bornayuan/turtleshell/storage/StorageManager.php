<?php

namespace com\bornayuan\turtleshell\storage;

require_once ABSPATH . '/com/bornayuan/turtleshell/storage/database/DatabaseConnector.php';
require_once ABSPATH . '/com/bornayuan/turtleshell/storage/operator/UserAuthOperator.php';
require_once ABSPATH . '/com/bornayuan/turtleshell/storage/operator/UserBasicOperator.php';

use com\bornayuan\turtleshell\storage\database\DatabaseConnector;
use com\bornayuan\turtleshell\storage\operator\UserBasicOperator;
use com\bornayuan\turtleshell\storage\operator\UserAuthOperator;

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
	 * @return \com\bornayuan\turtleshell\storage\entity\UserBasicEntity
	 */
	public function loadUserBasic($id) {
		$dbConnector = new DatabaseConnector ();
		$ubOperator = new UserBasicOperator ( $dbConnector );
		$ubEntity = $ubOperator->load ( $id );
		return $ubEntity;
	}
	
	/**
	 * Sign In
	 *
	 * @param string $username
	 * @param string $password,
	 *        	the password should be encrypted before use it.
	 * @return boolean, true for sign in successfully and false is for failed.
	 */
	public function signIn($username, $password) {
		/*
		 * Call signOut() first.
		 */
		// $this->signOut ();
		
		/*
		 * Initialize DatabaseConnector
		 */
		$dbConnector = new DatabaseConnector ();
		
		/*
		 * Find UserAuthEntity by username and password
		 */
		$dbConnector->beginTransaction ();
		$dbConnector->setIndependentTransactionFlag ( false );
		$uaOperator = new UserAuthOperator ( $dbConnector );
		$uaEntity = $uaOperator->findByUsernameAndPassword ( $username, $password );
		$dbConnector->setIndependentTransactionFlag ( true );
		$dbConnector->endTransaction ();
		
		/*
		 * Check the result
		 */
		if ($uaEntity != null && $uaEntity->getId () > 0) {
			
			/*
			 * Load UserBasicEntity by primary key
			 */
			$dbConnector->beginTransaction ();
			$dbConnector->setIndependentTransactionFlag ( false );
			$ubOperator = new UserBasicOperator ( $dbConnector);
			$ubEntity = $ubOperator->load ( $uaEntity->getUserBasicId () );
			$dbConnector->setIndependentTransactionFlag ( true );
			$dbConnector->endTransaction ();
			
			/*
			 * Check the result
			 */
			if ($ubEntity != null && $ubEntity->getId () > 0) {
				session_start ();
				$_SESSION [TS__SESSION__SIGN_IN] = true;
				$SIGNED_USER_BASIC = $ubEntity;
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	/**
	 * Sign Out
	 */
	public function signOut() {
		session_unset ();
		session_destroy ();
		if (isset ( $_SESSION )) {
			unset ( $_SESSIONI );
		}
	}
}

?>