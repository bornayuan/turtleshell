<?php

namespace com\bornayuan\turtleshell\storage\operator;

use com\bornayuan\turtleshell\storage\entity\EntityUtility;
use ReflectionClass;
use ReflectionMethod;

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
		$rMethod = new ReflectionMethod ( $igEntity );
		$columnNames = EntityUtility::getColumnNames ( $igEntity );
		foreach ( $columnNames as $columnName ) {
			$writeMethodName = EntityUtility::getWriteMethodName ( $columnName );
			$rMethod->invoke ( $igEntity, $writeMethodName, $rowData [$value] );
		}
		return $igEntity;
	}
}

