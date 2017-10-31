<?php

namespace com\bornayuan\turtleshell\storage;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\DatabaseDriver;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\Export\ClassMetadataExporter;
use com\bornayuan\turtleshell\ConfigurationManager;

/**
 *
 * @author borna
 *        
 */
class StorageUtility {
	
	/**
	 * Constructor
	 */
	public function __construct() {
	}
	
	/**
	 * Generate all entities from existing database tables, and all XML mapper files.
	 */
	public static function generateAllEntities() {
		/*
		 * Prepare parameters
		 */
		$isDevMode = true;
		$databaseConfiguration = ConfigurationManager::getDatabaseConfiguration ();
		
		$xmlMapperPaths = [ 
				ConfigurationManager::getMapperFilePath () 
		];
		
		/*
		 * Initialize
		 */
		$doctrineConfiguration = Setup::createXMLMetadataConfiguration ( $xmlMapperPaths, $isDevMode );
		$entityManager = EntityManager::create ( $databaseConfiguration, $doctrineConfiguration );
		$connection = $entityManager->getConnection ();
		$schemaManager = $connection->getSchemaManager ();
		$databaseDriver = new DatabaseDriver ( $schemaManager );
		$entityManager->getConfiguration ()->setMetadataDriverImpl ( $databaseDriver );
		$cmf = new DisconnectedClassMetadataFactory ();
		$cmf->setEntityManager ( $entityManager );
		$metadata = $cmf->getAllMetadata ();
		
		/*
		 * Generate XML Mapper files
		 */
		$cme = new ClassMetadataExporter ();
		$exporter = $cme->getExporter ( 'xml', ConfigurationManager::getMapperFilePath () );
		$exporter->setMetadata ( $metadata );
		$exporter->export ();
		
		/*
		 * Generate Entities
		 */
		$generator = new EntityGenerator ();
		$generator->setGenerateAnnotations ( true );
		$generator->setGenerateStubMethods ( true );
		$generator->setRegenerateEntityIfExists ( true );
		$generator->setUpdateEntityIfExists ( true );
		$generator->generate ( $metadata, ConfigurationManager::getEntityFilePath () );
	}
}

?>
