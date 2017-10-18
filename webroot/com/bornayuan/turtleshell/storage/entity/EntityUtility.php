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
	 * Column names of table TS_USER_BASIC
	 *
	 * @var array
	 */
	private static $COLUMN_NAMES__TS_USER_BASIC = array (
			'id' => 'ID',
			'firstName' => 'FIRST_NAME',
			'middleName' => 'MIDDLE_NAME',
			'lastName' => 'LAST_NAME',
			'nickName' => 'NICK_NAME',
			'email' => 'EMAIL',
			'uniqueIdentity' => 'UNIQUE_IDENTITY',
			'createdTimestamp' => 'CREATED_TIMESTAMP',
			'updatedTimestamp' => 'UPDATED_TIMESTAMP' 
	);
	
	/**
	 * Column names of table TS_USER_AUTH.
	 *
	 * @var array
	 */
	private static $COLUMN_NAMES__TS_USER_AUTH = array (
			'id' => 'ID',
			'userBasicId' => 'USER_BASIC_ID',
			'username' => 'USERNAME',
			'password' => 'PASSWORD',
			'createdTimestamp' => 'CREATED_TIMESTAMP',
			'updatedTimestamp' => 'UPDATED_TIMESTAMP' 
	);
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Get column names of entity.
	 * 
	 * @param \com\bornayuan\turtleshell\storage\entity\IGenericEntity $igEntity
	 * @return array|NULL
	 */
	public static function getColumnNames($igEntity) {
		$reflec = new ReflectionClass ( $igEntity );
		$entityName = $reflec->getShortName ();
		
		if ($entityName == 'UserBasicEntity') {
			return self::$COLUMN_NAMES__TS_USER_BASIC;
		} elseif ($entityName == 'UserAuthEntity') {
			return self::$COLUMN_NAMES__TS_USER_AUTH;
		} else {
			return null;
		}
	}
}

