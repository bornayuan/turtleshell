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
	 * @see \objectlibrary\storage\operator\IGenericOperator::getOperatorName()
	 */
	public function getOperatorName() {
		return $this->operatorName;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \objectlibrary\storage\operator\IGenericOperator::setOperatorName()
	 */
	public function setOperatorName($operatorName) {
		$this->operatorName = $operatorName;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \objectlibrary\storage\operator\IGenericOperator::getDatabaseConnection()
	 */
	public function getDatabaseConnection() {
		return $this->databaseConnection;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \objectlibrary\storage\operator\IGenericOperator::setDatabaseConnection()
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