<?php
require dirname ( __FILE__ ) . '/vendor/autoload.php';

use com\bornayuan\turtleshell\template\TemplateGenerator;

$tu = new TemplateGenerator ();
$signInPage = $tu->getSignInTemplate ();

echo $signInPage;
?>