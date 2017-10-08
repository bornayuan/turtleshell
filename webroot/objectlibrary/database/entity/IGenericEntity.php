<?php

namespace objectlibrary\database\entity;

/**
 *
 * @author borna
 *        
 */
interface IGenericEntity {
	
	/**
	 * Get primary key, int type.
	 */
	public function getId();
	
	/**
	 * Set primary key, int type.
	 * 
	 * @param int $id
	 */
	public function setId(int $id);
}

?>