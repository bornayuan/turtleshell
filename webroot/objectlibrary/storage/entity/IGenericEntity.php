<?php

namespace objectlibrary\storage\entity;

/**
 *
 * @author borna
 *        
 */
interface IGenericEntity {
	
	/**
	 * Get primary key
	 */
	public function getId();
	
	/**
	 * Set primary key
	 * 
	 * @param mixed $id
	 */
	public function setId($id);
}

?>