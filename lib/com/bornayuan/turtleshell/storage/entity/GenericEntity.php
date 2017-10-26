<?php

namespace com\bornayuan\turtleshell\storage\entity;

/**
 *
 * @author borna
 *         
 */
abstract class GenericEntity implements IGenericEntity {
	
	/**
	 *
	 * @var string, primary key
	 */
	public $id = null;
	
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
	public function getId() {
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