<?php
require (dirname ( __FILE__ ) . '/ts-configuration.php');

require (constant ( 'ABSPATH' ) . '/objectlibrary/storage/DatabaseConnector.php');
require (constant ( 'ABSPATH' ) . '/objectlibrary/storage/operator/UserBasicOperator.php');
require (constant ( 'ABSPATH' ) . '/objectlibrary/storage/entity/UserBasicEntity.php');

use objectlibrary\storage\DatabaseConnector;
use objectlibrary\storage\entity\UserBasicEntity;
use objectlibrary\storage\operator\UserBasicOperator;

$du = new DatabaseConnector ();
$du->beginTransaction ();

$ubo = new UserBasicOperator ( $du->getDatabaseConnection () );
$ube = new UserBasicEntity ();
$ube = $ubo->loadById ( 1 );

$du->endTransaction();

echo $ube->getUniqueIdentity ();

?>