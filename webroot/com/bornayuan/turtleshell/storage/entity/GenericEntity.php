<?php

namespace com\bornayuan\turtleshell\storage\entity;

require_once constant ( 'ABSPATH' ) . '/com/bornayuan/turtleshell/storage/entity/IGenericEntity.php';

/**
 *
 * @author borna
 *        
 */
abstract class GenericEntity implements IGenericEntity {
	
	/**
	 *
	 * @var int, primary key
	 */
	private $id = - 1;
	
	/**
	 * Entity name
	 *
	 * @var string
	 */
	private $entityName = null;
	
	/**
	 * Constructor
	 * 
	 * @param string $entityName
	 */
	public function __construct() {
		$argumentCountNumber = func_num_args ();
		if ($argumentCountNumber == 1) {
			$this->setEntityName ( func_get_arg ( 0 ) );
		} else {
			echo (' <font color="#FF0000">TurtleShell, GenericEntity must accept correct argument(s) in constructor method</font> ');
			exit ();
		}
	}
	
	/**
	 * Set entity name
	 *
	 * @param string $entityName
	 */
	private function setEntityName($entityName) {
		$this->entityName = $entityName;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \com\bornayuan\turtleshell\storage\entity\IGenericEntity::getEntityName()
	 */
	public function getEntityName() {
		return $this->entityName;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \com\bornayuan\turtleshell\storage\entity\IGenericEntity::getId()
	 */
	public final function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \com\bornayuan\turtleshell\storage\entity\IGenericEntity::setId()
	 */
	public function setId($id) {
		$this->id = $id;
	}
}

?>