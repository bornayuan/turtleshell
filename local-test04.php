<?php
require dirname ( __FILE__ ) . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use com\bornayuan\turtleshell\ConfigurationManager;
use com\bornayuan\turtleshell\storage\entity\UserAddressEntity;
use Doctrine\ORM\Configuration;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\Mapping\Driver\XmlDriver;


$isDevMode = true;

// the connection configuration
$databaseConfiguration = array (
		'driver' => 'pdo_mysql',
		'host' => ConfigurationManager::$DATABASE_SERVER,
		'charset' => ConfigurationManager::$DATABASE_CHARSET,
		'user' => ConfigurationManager::$DATABASE_USERNAME,
		'password' => ConfigurationManager::$DATABASE_PASSWORD,
		'dbname' => ConfigurationManager::$DATABASE_NAME 
);

$mapperPaths = array (
		dirname ( __FILE__ ) .'\lib\com\bornayuan\turtleshell\storage\mapper\UserAddressEntity.dcm.xml' 
);

echo 'A<br />';

$arrayCache = new ArrayCache();
$xmlDriver = new XmlDriver('\com\bornayuan\turtleshell\storage\mapper');


$doctrineConfiguration = new Configuration();
$doctrineConfiguration->setMetadataCacheImpl($arrayCache);
$doctrineConfiguration->setMetadataDriverImpl($xmlDriver);
$doctrineConfiguration->setProxyDir(dirname ( __FILE__ ));
$doctrineConfiguration->setProxyNamespace('proxies');
$doctrineConfiguration->setAutoGenerateProxyClasses(true);



echo 'B<br />';

$entityManager = EntityManager::create ( $databaseConfiguration, $doctrineConfiguration );
echo 'C<br />';

$uaEntity = new UserAddressEntity ();
$uaEntity->setLabel ( 'Home Address' );
echo 'D<br />';

$entityManager->persist ( $uaEntity );
echo 'E<br />';

$entityManager->flush ();
echo 'F<br />';

?>




<html>
<head>
<title>Doctrine Test</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>A</td>
			<td>B</td>
			<td>C</td>
			<td>D</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</body>
</html>