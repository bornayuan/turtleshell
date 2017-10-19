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
	 * Property and column mapping
	 *
	 * @var array
	 */
	private static $PROPERTY_COLUMN_MAPPING = [ 
			'UserBasicEntity' => [ 
					'id' => 'id',
					'firstName' => 'first_name',
					'middleName' => 'middle_name',
					'lastName' => 'last_name',
					'nickName' => 'nick_name',
					'email' => 'email',
					'uniqueIdentity' => 'unique_identity',
					'createdTimestamp' => 'created_timestamp',
					'updatedTimestamp' => 'updated_timestamp' 
			],
			'UserAuthEntity' => [ 
					'id' => 'id',
					'userBasicId' => 'user_basic_id',
					'username' => 'username',
					'password' => 'password',
					'createdTimestamp' => 'created_timestamp',
					'updatedTimestamp' => 'updated_timestamp' 
			] 
	];
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Get table name.
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @return string
	 */
	public static function getTableName($igEntity) {
		$reflec = new ReflectionClass ( $igEntity );
		$entityName = $reflec->getShortName ();
		return self::$ENTITY_TABLE_MAPPING [$entityName];
	}
	
	/**
	 * Get property column mapping.
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @return array
	 */
	public static function getPropertyColumnMapping($igEntity) {
		$reflec = new ReflectionClass ( $igEntity );
		$entityName = $reflec->getShortName ();
		return self::$PROPERTY_COLUMN_MAPPING [$entityName];
	}
	
	/**
	 * Get all columns
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @return array
	 */
	public static function getAllColumns($igEntity) {
		$pcMapping = self::getPropertyColumnMapping ( $igEntity );
		return array_values ( $pcMapping );
	}
	
	/**
	 * Get all properties
	 *
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @return array
	 */
	public static function getAllProperties($igEntity) {
		$pcMapping = self::getPropertyColumnMapping ( $igEntity );
		return array_keys ( $pcMapping );
	}
}

