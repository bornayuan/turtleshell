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
	 * DatabaseConnector
	 *
	 * @var \com\bornayuan\turtleshell\storage\database\DatabaseConnector
	 */
	private $databaseConnector = null;
	
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
	 * @see \com\bornayuan\turtleshell\storage\operator\IGenericOperator::getDatabaseConnector()
	 */
	public function getDatabaseConnector() {
		return $this->databaseConnector;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \com\bornayuan\turtleshell\storage\operator\IGenericOperator::setDatabaseConnector()
	 */
	public function setDatabaseConnector($databaseConnector) {
		$this->databaseConnector = $databaseConnector;
	}
	
	/**
	 * Constructor, this method must accept correct arguments.
	 *
	 * @param string $operatorName
	 * @param \com\bornayuan\turtleshell\storage\database\DatabaseConnector $databaseConnector
	 */
	public function __construct() {
		$argumentCountNumber = func_num_args ();
		if ($argumentCountNumber == 2) {
			$this->setOperatorName ( func_get_arg ( 0 ) );
			$this->setDatabaseConnector ( func_get_arg ( 1 ) );
		} else {
			echo (' <font color="#FF0000">TurtleShell, GenericOperator must accept correct argument(s) in constructor method</font> ');
			exit ();
		}
	}
}

?>