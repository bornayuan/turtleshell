<?php

namespace objectlibrary\storage;

require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/DatabaseConnector.php';
require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/UserAuthOperator.php';
require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/UserBasicOperator.php';

use objectlibrary\storage\operator\UserBasicOperator;
use objectlibrary\storage\operator\UserAuthOperator;

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

		$dbConnector->beginTransaction ();
		$ubOperator = new UserBasicOperator ( $dbConnector->getDatabaseConnection () );
		$ubEntity = $ubOperator->loadById ( $id );
		$dbConnector->endTransaction ();
		
		return $ubEntity;
	}
	
	/**
	 * Sign In
	 *
	 * @param string $username
	 * @param string $password,
	 *        	the password has been encrypted before use it.
	 * @return boolean, true for sign in successfully and false is for failed.
	 */
	public function signIn($username, $password) {
		/*
		 * Call signOut() first.
		 */
		//$this->signOut ();
		
		/*
		 * Initialize DatabaseConnector
		 */
		$dbConnector = new DatabaseConnector ();
		
		/*
		 * Find UserAuthEntity by username and password
		 */
		$dbConnector->beginTransaction ();
		$uaOperator = new UserAuthOperator ( $dbConnector->getDatabaseConnection () );
		$uaEntity = $uaOperator->findByUsernameAndPassword ( $username, $password );
		$dbConnector->endTransaction ();
		
		/*
		 * Check the result
		 */
		if ($uaEntity != null && $uaEntity->getId () > 0) {
			
			/*
			 * Load UserBasicEntity by primary key
			 */
			$dbConnector->beginTransaction ();
			$ubOperator = new UserBasicOperator ( $dbConnector->getDatabaseConnection () );
			$ubEntity = $ubOperator->loadById ( $uaEntity->getUserBasicId () );
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