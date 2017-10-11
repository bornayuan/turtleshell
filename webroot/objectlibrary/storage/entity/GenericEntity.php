<?php

namespace objectlibrary\storage\entity;

require_once constant ( 'ABSPATH' ) . '/objectlibrary/storage/entity/IGenericEntity.php';

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
	 * @see \objectlibrary\storage\entity\IGenericEntity::getId()
	 */
	public final function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \objectlibrary\storage\entity\IGenericEntity::setId()
	 */
	public function setId($id) {
		$this->id = $id;
	}
}

?>