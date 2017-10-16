<?php

namespace com\bornayuan\turtleshell\storage\entity;

/**
 *
 * @author borna
 *        
 */
interface IGenericEntity {
	
	/**
	 * Get primary key
	 * 
	 * @return int
	 */
	public function getId();
	
	/**
	 * Set primary key
	 *
	 * @param int $id
	 */
	public function setId($id);
}

?>