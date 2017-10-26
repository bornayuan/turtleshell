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
	public static $DATABASE_SERVER = 'localhost';
	public static $DATABASE_PORT = 3306;
	public static $DATABASE_NAME = 'turtleshell';
	public static $DATABASE_USERNAME = 'root';
	public static $DATABASE_PASSWORD = '';
	public static $DATABASE_SOCKET = null;
	public static $DATABASE_FLAG = 0;
	public static $DATABASE_CHARSET = 'utf8';
	
	/**
	 * Version Number
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
	 */
	private function __construct() {
	}
}

