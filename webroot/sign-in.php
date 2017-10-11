<?php
require (dirname ( __FILE__ ) . '/ts-configuration.php');

require constant ( 'ABSPATH' ) . '/objectlibrary/template/TemplateGenerator.php';

use objectlibrary\template\TemplateGenerator;

$tu = new TemplateGenerator ();
$signInPage = $tu->getSignInTemplate ();

echo $signInPage;
?>