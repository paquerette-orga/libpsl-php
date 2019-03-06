<?php
require("psl-inspector.php");

$psl_file = "test/test.dat";
$psl_test = new CheckTLD($psl_file, "lio@test.noho.st");

$hello = $psl_test->CheckTLD();

?>