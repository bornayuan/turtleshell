<?php
require_once dirname ( __FILE__ ) . '/ts-configuration.php';
require_once ABSPATH . '/com/bornayuan/turtleshell/storage/entity/UserBasicEntity.php';
use com\bornayuan\turtleshell\storage\entity\UserBasicEntity;

$parameters = array (
		'firstName' => 'Jack',
		'middleName' => 'Aaron',
		'lastName' => 'Foth',
		'nickName' => 'Jack',
		'email' => 'abc@hotmail.com' 
);

$columnKeys = key ( UserBasicEntity::$COLUMN_NAMES );

$keys = array_keys ( $parameters );

var_dump ( $keys );
var_dump ( UserBasicEntity::$COLUMN_NAMES );

$condition = '';

foreach ( $keys as $key ) {
	if (array_key_exists ( $key, UserBasicEntity::$COLUMN_NAMES )) {
		$condition = $condition . ' AND '.UserBasicEntity::$COLUMN_NAMES[$key].' LIKE \'%'.$parameters[$key].'%\' ';
	}
}

echo $condition;
?>