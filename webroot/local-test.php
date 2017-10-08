<?php
require 'objectlibrary\DatabaseUtility.php';
// require 'objectlibrary\database\entity\UserBasicEntity';
// require 'objectlibrary\database\operator\UserBasicOperator';

use objectlibrary\DatabaseUtility;
// use objectlibrary\database\entity\UserBasicEntity;
// use objectlibrary\database\operator\UserBasicOperator;

print ("Hello World!") ;
print ("</br>") ;

$DU = new DatabaseUtility ();
// $DU->getVersionNumber();

$DU->getUserBasicById ( 1 );

// $ube = new UserBasicEntity();
// $ubo = new UserBasicOperator();
// $ube = $ubo->loadById(1);
// print('UniqueIdentity: '.$ube->getUniqueIdentity());

// $DU->sqlInjectionDefense(1);
?>