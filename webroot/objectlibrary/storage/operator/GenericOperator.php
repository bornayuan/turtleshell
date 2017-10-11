<?php

namespace objectlibrary\storage\operator;

require constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/IGenericOperator.php';

/**
 *
 * @author borna
 *        
 */
abstract class GenericOperator implements IGenericOperator {
	/**
	 * Database connection
	 *
	 * @var object
	 */
	private $databaseConnection = null;
	
	/**
	 *
	 * @return object, database connection
	 */
	public function getDatabaseConnection() {
		return $this->databaseConnection;
	}
	
	/**
	 *
	 * @param object $databaseConnection
	 */
	public function setDatabaseConnection($databaseConnection) {
		$this->databaseConnection = $databaseConnection;
	}
	
	/**
	 * Constructor
	 */
	public function __construct() {
		$argumentNumber = func_num_args ();
		if ($argumentNumber == 1) {
			$this->setDatabaseConnection ( func_get_arg ( 0 ) );
		} else {
			echo (' <font color="#FF0000">TurtleShell, GenericOperator must have argument(s) in constructor method</font> ');
			exit ();
		}
	}
}

?>