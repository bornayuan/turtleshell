<?php

namespace com\bornayuan\turtleshell\storage\operator;

require_once constant ( 'ABSPATH' ) . '/com/bornayuan/turtleshell/storage/operator/IGenericOperator.php';

/**
 *
 * @author borna
 *        
 */
abstract class GenericOperator implements IGenericOperator {
	
	/**
	 * Operator name
	 *
	 * @var string
	 */
	private $operatorName = null;
	
	/**
	 * Database connection
	 *
	 * @var object
	 */
	private $databaseConnection = null;
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \com\bornayuan\turtleshell\storage\operator\IGenericOperator::getOperatorName()
	 */
	public function getOperatorName() {
		return $this->operatorName;
	}
	
	/**
	 * Set operator name
	 * 
	 * @param string $operatorName
	 */
	private function setOperatorName($operatorName) {
		$this->operatorName = $operatorName;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \com\bornayuan\turtleshell\storage\operator\IGenericOperator::getDatabaseConnection()
	 */
	public function getDatabaseConnection() {
		return $this->databaseConnection;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \com\bornayuan\turtleshell\storage\operator\IGenericOperator::setDatabaseConnection()
	 */
	public function setDatabaseConnection($databaseConnection) {
		$this->databaseConnection = $databaseConnection;
	}
	
	/**
	 * Constructor, this method must accept arguments, args[0] is $operatorName, args[1] is $databaseConnection.
	 */
	public function __construct() {
		$argumentCountNumber = func_num_args ();
		if ($argumentCountNumber == 2) {
			$this->setOperatorName ( func_get_arg ( 0 ) );
			$this->setDatabaseConnection ( func_get_arg ( 1 ) );
		} else {
			echo (' <font color="#FF0000">TurtleShell, GenericOperator must accept argument(s) in constructor method</font> ');
			exit ();
		}
	}
}

?>