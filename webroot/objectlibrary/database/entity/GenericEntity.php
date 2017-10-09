<?php

namespace objectlibrary\database\entity;

require constant ( 'ABSPATH' ) . '/objectlibrary/database/entity/IGenericEntity.php';

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
	 * @see \objectlibrary\database\entity\IGenericEntity::getId()
	 */
	public final function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \objectlibrary\database\entity\IGenericEntity::setId()
	 */
	public function setId($id) {
		$this->id = $id;
	}
}

?>