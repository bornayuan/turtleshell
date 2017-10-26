<?php
require dirname ( __FILE__ ) . '/vendor/autoload.php';

use com\bornayuan\turtleshell\storage\entity\EntityUtility;

$columnName = 'last_name_is_not_';
$readMethodName = EntityUtility::getReadMethodName ( $columnName );
$writeMethodName = EntityUtility::getWriteMethodName ( $columnName );

echo '$columnName: ' . $columnName . '<br />';
echo '$readMethodName: ' . $readMethodName . '<br />';
echo '$writeMethodName: ' . $writeMethodName . '<br />';

?>