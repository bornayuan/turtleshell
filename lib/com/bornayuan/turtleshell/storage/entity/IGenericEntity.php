<?php

namespace com\bornayuan\turtleshell\storage\entity;

/**
 *
 * @author borna
 *        
 */
interface IGenericEntity {
	
	/**
	 * Get ID, it is primary key
	 *
	 * @return string Primary key
	 */
	public function getId();
	
	/**
	 * Set ID, it is primary key
	 *
	 * @param string $id
	 *        	Primary key
	 */
	public function setId($id);
}

?>