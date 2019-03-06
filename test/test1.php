<?php
require("/home/julien/Documents/Dev/Sys/libpsl-php/psl-inspector.php");

$psl_file = "/home/julien/Documents/Dev/Sys/libpsl-php/test/test.dat";
$psl_test = new CheckTLD($psl_file, "test@test.com");

$hello = $psl_test->CheckTLD();

?>