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
	 * Constructor
	 */
	public function __construct() {
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