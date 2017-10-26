<?php

namespace com\bornayuan\turtleshell\storage\operator;

use com\bornayuan\turtleshell\storage\database\DatabaseConnector;

/**
 *
 * @author borna
 *        
 */
interface IGenericOperator {
	
	/**
	 * Get operator name
	 *
	 * @return string
	 */
	public function getOperatorName();
	
	/**
	 * Get DatabaseConnector.
	 *
	 * @return DatabaseConnector
	 */
	public function getDatabaseConnector();
	
	/**
	 * Set DatabaseConnector
	 *
	 * @param
	 *        	\com\bornayuan\turtleshell\storage\database\DatabaseConnector
	 */
	public function setDatabaseConnector($databaseConnector);
}

?>