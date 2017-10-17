<?php

namespace com\bornayuan\turtleshell\storage;

/**
 *
 * @author borna
 *        
 */
class StorageUtility {
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Parse parameters array to SQL string
	 *
	 * @param array $parameters
	 *        	Key-value array list, the key should be same as the key of $columns.
	 * @param array $columns
	 *        	Key-value array list, it should be pre-definded in entity.
	 * @return string parsed SQL condition
	 */
	public static function parseParametersWithColumns($parameters, $columns) {
		$keys = array_keys ( $parameters );
		
		$condition = '';
		
		foreach ( $keys as $key ) {
			if (array_key_exists ( $key, $columns )) {
				$condition = $condition . ' AND ' . $columns [$key] . ' LIKE \'%' . $parameters [$key] . '%\' ';
			}
		}
		
		return $condition;
	}
}

?>