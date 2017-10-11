<?php

namespace objectlibrary\storage\operator;

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
	 * Get database connection.
	 *
	 * @return object, database connection
	 */
	public function getDatabaseConnection();
	
	/**
	 * Set database connection
	 *
	 * @param object $databaseConnection
	 */
	public function setDatabaseConnection($databaseConnection);
}

?>