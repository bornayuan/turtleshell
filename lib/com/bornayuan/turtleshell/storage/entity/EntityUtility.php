<?php

namespace com\bornayuan\turtleshell\storage\entity;

use ReflectionClass;

/**
 *
 * @author borna
 *        
 */
class EntityUtility {
	/**
	 * Entity and table mapping
	 *
	 * @var array
	 */
	private static $ENTITY_TABLE_MAPPING = [ 
			'UserBasicEntity' => 'ts_user_basic',
			'UserAuthEntity' => 'ts_user_auth' 
	];
	
	/**
	 * TABLES
	 *
	 * @var array
	 */
	private static $TABLES = [ 
			'ts_user_basic' => [ 
					'id',
					'first_name',
					'middle_name',
					'last_name',
					'nick_name',
					'email',
					'unique_identity',
					'created_timestamp',
					'updated_timestamp' 
			],
			'ts_user_auth' => [ 
					'id',
					'user_basic_id',
					'username',
					'password',
					'created_timestamp',
					'updated_timestamp' 
			] 
	];
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Get table name.
	 *
	 * @param IGenericEntity $igEntity
	 * @return string
	 */
	public static function getTableName($igEntity) {
		$reflec = new ReflectionClass ( $igEntity );
		$entityName = $reflec->getShortName ();
		return self::$ENTITY_TABLE_MAPPING [$entityName];
	}
	
	/**
	 * Get column names
	 *
	 * @param IGenericEntity $igEntity
	 * @return array
	 */
	public static function getColumnNames($igEntity) {
		$tableName = self::getTableName ( $igEntity );
		return self::$TABLES [$tableName];
	}
	
	/**
	 * Get read method name, which starts with 'get'.
	 *
	 * @param string $columnName
	 * @return string Read method name
	 */
	public static function getReadMethodName($columnName) {
		$columnNameLength = strlen ( $columnName );
		$underscorePosition = strpos ( $columnName, '_' );
		
		$readMethodName = strtoupper ( substr ( $columnName, 0, 1 ) );
		$readMethodName = $readMethodName . substr ( $columnName, 1, $underscorePosition - 1 );
		$readMethodName = $readMethodName . strtoupper ( substr ( $columnName, $underscorePosition + 1, 1 ) ) . substr ( $columnName, $underscorePosition + 2, $columnNameLength );
		
		if (strpos ( $readMethodName, '_' ) === false) {
			return 'get' . $readMethodName;
		} else {
			return self::getReadMethodName ( $readMethodName );
		}
	}
	
	/**
	 * Get write method name, which starts with 'set'.
	 *
	 * @param string $columnName
	 * @return string Write method name
	 */
	public static function getWriteMethodName($columnName) {
		$columnNameLength = strlen ( $columnName );
		$underscorePosition = strpos ( $columnName, '_' );
		
		$readMethodName = strtoupper ( substr ( $columnName, 0, 1 ) );
		$readMethodName = $readMethodName . substr ( $columnName, 1, $underscorePosition - 1 );
		$readMethodName = $readMethodName . strtoupper ( substr ( $columnName, $underscorePosition + 1, 1 ) ) . substr ( $columnName, $underscorePosition + 2, $columnNameLength );
		
		if (strpos ( $readMethodName, '_' ) === false) {
			return 'set' . $readMethodName;
		} else {
			return self::getWriteMethodName ( $readMethodName );
		}
	}
}

