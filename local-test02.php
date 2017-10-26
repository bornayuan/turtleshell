<?php
require dirname ( __FILE__ ) . '/vendor/autoload.php';

use com\bornayuan\turtleshell\storage\entity\UserBasicEntity;
use com\bornayuan\turtleshell\storage\StorageService;

$ubEntity = new UserBasicEntity ();
//$ubEntity->setFirstName ( 'l' );
$ubEntity->setMiddleName('o');
//$ubEntity->setEmail ( 'JJ@Hotmail.com' );

$ss = new StorageService ();
$ubEntities = $ss->findUserBasicEntities ( $ubEntity );
var_dump ( $ubEntities );
?>