<?php

/**
 * Version Number
 * @var string
 */
const VERSION_NUMBER = 'V0.1.20171006';

/**
 * Template name
 *
 * @var string, template name
 */
const TS__TEMPLATE__SIGN_UP = 'TS__TEMPLATE__SIGN_UP';
const TS__TEMPLATE__SIGN_IN = 'TS__TEMPLATE__SIGN_IN';
const TS__TEMPLATE__SIGN_OUT = 'TS__TEMPLATE__SIGN_OUT';

/**
 * This variable will be used in session operation, the value is boolean.
 * And such as $_SESSION[TS__SESSION__SIGN_IN] = true;
 *
 * @var string, session variable name
 */
const TS__SESSION__SIGN_IN = 'TS__SESSION__SIGN_IN';

/**
 * UserBasicEntity will be assigned once sign in operation is successful.
 * 
 * @var \com\bornayuan\turtleshell\storage\entity\UserBasicEntity
 */
global $SIGNED_USER_BASIC;

?>