<?php
ini_set("display_errors", 1);
error_reporting(-1);
include_once("core/EquationInterface.php");
include_once("core/LogInterface.php");
include_once("core/LogAbstract.php");
include_once("zxc/TGException.php");
include_once("zxc/Linear.php");
include_once("zxc/Quadratic.php");
include_once("zxc/Log.php");
$co_arr = [];
$file = fopen("version", "r");
zxc\Log::log('Version: ' . fread($file, 1024));
foreach (["a", "b", "c"] as $co) {
    echo "Enter " . $co . ": ";
    $line = stream_get_line(STDIN, 1024, PHP_EOL);
    $co_arr[$co] = $line === "" ? 0 : $line;
}
$a = $co_arr["a"];
$b = $co_arr["b"];
$c = $co_arr["c"];
//zxc\Log::log("Entered numbers: " . implode(", ", $co_arr));

try {
    zxc\Log::log("Equation: $a*x^2 + $b*x + $c = 0");
    $solver = new zxc\Quadratic($a, $b, $c);
    zxc\Log::log("Roots: " . implode(", ", $solver->solve($a, $b, $c)));
} catch (zxc\TGException $ex) {
    zxc\Log::log($ex->getMessage());
}
zxc\Log::write();
?>
