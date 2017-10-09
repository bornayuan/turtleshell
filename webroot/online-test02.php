<?php
require (dirname ( __FILE__ ) . '/ts-configuration.php');

require (constant ( 'ABSPATH' ) . '/objectlibrary/DatabaseUtility.php');
require (constant ( 'ABSPATH' ) . '/objectlibrary/database/operator/UserBasicOperator.php');
require (constant ( 'ABSPATH' ) . '/objectlibrary/database/entity/UserBasicEntity.php');

use objectlibrary\DatabaseUtility;
use objectlibrary\database\entity\UserBasicEntity;
use objectlibrary\database\operator\UserBasicOperator;

$du = new DatabaseUtility ();
$du->beginTransaction ();

$ubo = new UserBasicOperator ( $du->getDatabaseConnection () );
$ube = new UserBasicEntity ();
$ube = $ubo->loadById ( 1 );

$du->endTransaction();

echo $ube->getUniqueIdentity ();

?>