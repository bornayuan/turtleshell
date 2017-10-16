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
	 * @return int, primary key
	 */
	public function getId();
	
	/**
	 * Set primary key
	 *
	 * @param
	 *        	int, primary key
	 */
	public function setId($id);
	
	/**
	 * Get entity name
	 *
	 * @return string, entity name
	 */
	public function getEntityName();
}

?>