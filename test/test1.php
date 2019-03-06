<?php
require("psl-inspector.php");

$psl_file = "test/test.dat";
$psl_test = new CheckTLD($psl_file, "test@test.com");

$hello = $psl_test->CheckTLD();

?>