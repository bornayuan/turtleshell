<?php
require (dirname ( __FILE__ ) . '/ts-configuration.php');

require constant ( 'ABSPATH' ) . '/com/bornayuan/turtleshell/template/TemplateGenerator.php';

use com\bornayuan\turtleshell\template\TemplateGenerator;

$tu = new TemplateGenerator ();
$signInPage = $tu->getSignInTemplate ();

echo $signInPage;
?>