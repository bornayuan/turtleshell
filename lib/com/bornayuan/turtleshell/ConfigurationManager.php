<?php

namespace com\bornayuan\turtleshell;

/**
 *
 * @author borna
 *        
 */
class ConfigurationManager {
	
	/*
	 * Database Configuration Information
	 */
	public static $DATABASE_DRIVER = 'pdo_mysql';
	public static $DATABASE_SERVER = 'localhost';
	public static $DATABASE_PORT = 3306;
	public static $DATABASE_CHARSET = 'utf8';
	public static $DATABASE_NAME = 'turtleshell';
	public static $DATABASE_USERNAME = 'root';
	public static $DATABASE_PASSWORD = '';
	public static $DATABASE_SOCKET = null;
	public static $DATABASE_FLAG = 0;
	
	/**
	 * $DATABASE_CONFIGURATION
	 * @var array
	 */
	private static $DATABASE_CONFIGURATION = null;
	
	/**
	 * $DOCUMENT_ROOT_PATH
	 * @var string
	 */
	private static $DOCUMENT_ROOT_PATH = null;
	
	/**
	 * Mapper file path
	 *
	 * @var string
	 */
	private static $MAPPER_FILE_PATH = '/lib/com/bornayuan/turtleshell/storage/mapper';
	
	/**
	 * Entity file path
	 *
	 * @var string
	 */
	private static $ENTITY_FILE_PATH = '/lib/com/bornayuan/turtleshell/storage/mapper';
	
	/**
	 * Version Number
	 *
	 * @var string
	 */
	public static $VERSION_NUMBER = 'V0.1.20171006';
	
	/**
	 * Template name
	 *
	 * @var string, template name
	 */
	public static $TS__TEMPLATE__SIGN_UP = 'TS__TEMPLATE__SIGN_UP';
	public static $TS__TEMPLATE__SIGN_IN = 'TS__TEMPLATE__SIGN_IN';
	public static $TS__TEMPLATE__SIGN_OUT = 'TS__TEMPLATE__SIGN_OUT';
	
	/**
	 * This variable will be used in session operation, the value is boolean.
	 * And such as $_SESSION[TS__SESSION__SIGN_IN] = true;
	 *
	 * @var string, session variable name
	 */
	public static $TS__SESSION__SIGN_IN = 'TS__SESSION__SIGN_IN';

	
	/**
	 * Constructor
	 */
	private function __construct() {
	}
	
	/**
	 * Initialize
	 */
	private static function initialize() {
		/*
		 * Initialize $DATABASE_CONFIGURATION
		 */
		if (self::$DATABASE_CONFIGURATION == null) {
			self::$DATABASE_CONFIGURATION = [
					'driver' => self::$DATABASE_DRIVER,
					'host' => self::$DATABASE_SERVER,
					'charset' => self::$DATABASE_CHARSET,
					'user' => self::$DATABASE_USERNAME,
					'password' => self::$DATABASE_PASSWORD,
					'dbname' => self::$DATABASE_NAME
			];
		}
		
		/*
		 * Initialize $DOCUMENT_ROOT_PATH
		 */
		if (self::$DOCUMENT_ROOT_PATH == null) {
			self::$DOCUMENT_ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];
		}
	}
	
	/**
	 * Get database configuration
	 *
	 * @return array
	 */
	public static function getDatabaseConfiguration() {
		self::initialize();
		
		return self::$DATABASE_CONFIGURATION;
	}
	
	/**
	 * Get mapper file path
	 * 
	 * @return string
	 */
	public static function getMapperFilePath() {
		self::initialize();
		
		return self::$DOCUMENT_ROOT_PATH . self::$MAPPER_FILE_PATH;
	}
	
	/**
	 * Get entity file path
	 * 
	 * @return string
	 */
	public static function getEntityFilePath() {
		self::initialize();
		
		return self::$DOCUMENT_ROOT_PATH . self::$ENTITY_FILE_PATH;
	}
}

