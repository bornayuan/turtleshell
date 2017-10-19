<?php

namespace com\bornayuan\turtleshell\storage\operator;

require_once ABSPATH . '/com/bornayuan/turtleshell/storage/entity/EntityUtility.php';

use com\bornayuan\turtleshell\storage\entity\EntityUtility;
use ReflectionClass;

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
	 * Parse entity to SQL for querying.
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @return string Full SQL script
	 */
	public static function parseEntityToSqlForQuerying($igEntity) {
		$reflect = new ReflectionClass ( $igEntity );
		$allProperties = EntityUtility::getAllProperties ( $igEntity );
		$tableName = EntityUtility::getTableName ( $igEntity );
		$pcMapping = EntityUtility::getPropertyColumnMapping ( $igEntity );
		
		// $parameterValues = array ();
		$querySql = 'select * from ' . $tableName . ' where 1=1';
		$condition = '';
		
		foreach ( $allProperties as $property ) {
			$value = $reflect->getProperty ( $property )->getValue ( $igEntity );
			if ($value != null && $value != '') {
				$condition = $condition . ' and ' . $pcMapping [$property] . ' like \'%' . $value . '%\'';
			}
		}
		
		return $querySql . $condition;
	}
	
	/**
	 * Build entity from queried row data.
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @param resource $rowData
	 * @return \com\bornayuan\turtleshell\storage\entity\IGenericEntity
	 */
	public static function buildEntityFromQueriedRowData($igEntity, $rowData) {
		$reflect = new ReflectionClass ( $igEntity );
		$pcMapping = EntityUtility::getPropertyColumnMapping ( $igEntity );
		foreach ( $pcMapping as $key => $value ) {
			$reflect->getProperty ( $key )->setValue ( $igEntity, $rowData [$value] );
		}
		return $igEntity;
	}
}

