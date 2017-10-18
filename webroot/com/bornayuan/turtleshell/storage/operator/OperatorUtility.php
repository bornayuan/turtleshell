<?php

namespace com\bornayuan\turtleshell\storage\operator;

require_once ABSPATH . '/com/bornayuan/turtleshell/storage/entity/EntityUtility.php';

use ReflectionClass;
use ReflectionProperty;
use com\bornayuan\turtleshell\storage\entity\EntityUtility;

/**
 *
 * @author borna
 *        
 */
class OperatorUtility {
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Build condition from entity.
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @return string Condition
	 */
	public static function buildCondition($igEntity) {
		$reflect = new ReflectionClass ( $igEntity );
		$properties = $reflect->getProperties ( ReflectionProperty::IS_PUBLIC );
		$columnNames = EntityUtility::getColumnNames ( $igEntity );
		// $parameterValues = array ();
		$condition = '';
		
		/*
		 * $properties structure:
		 * | 0 =>($key)
		 * ----|object(ReflectionProperty)[3]($value)
		 * --------|public 'name'($subKey) => string 'firstName'($subValue) (length=9)
		 * --------|public 'class' => string 'com\bornayuan\turtleshell\storage\entity\UserBasicEntity' (length=56)
		 * | 1 =>($key)
		 * ----|object(ReflectionProperty)[4]($value)
		 * --------|public 'name'($subKey) => string 'middleName'($subValue) (length=10)
		 * --------|public 'class' => string 'com\bornayuan\turtleshell\storage\entity\UserBasicEntity' (length=56)
		 * ......
		 */
		foreach ( $properties as $key => $value ) {
			foreach ( $value as $subKey => $subValue ) {
				if ($subKey == 'name') {
					$actualValue = $reflect->getProperty ( $subValue )->getValue ( $igEntity );
					if ($actualValue != null && $actualValue != '') {
						// $parameterValues [$subValue] = $actualValue;
						$condition = $condition . ' AND ' . $columnNames [$subValue] . ' LIKE \'%' . $actualValue . '%\' ';
					}
				}
			}
		}
		
		return $condition;
	}
}

