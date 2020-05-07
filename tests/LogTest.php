<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("core/EquationInterface.php");
require_once("core/LogAbstract.php");
require_once("core/LogInterface.php");

require_once("zxc/TGException.php");
require_once("zxc/Linear.php");
require_once("zxc/Log.php");
require_once("zxc/Quadratic.php");

final class LogTest extends TestCase
{
  public function testLog1(): void
  {
    zxc\Log::Instance()->log(123);
    zxc\Log::Instance()->log(456);

    ob_start();
    zxc\Log::Instance()->write();
    $log = ob_get_contents();
    ob_end_clean();

    $this->assertEquals($log, "123\n456");
  }

  public function testLog2(): void
  {
    zxc\Log::Instance()->log("Log");
    zxc\Log::Instance()->log("Test");

    ob_start();
    zxc\Log::Instance()->write();
    $log = ob_get_contents();
    ob_end_clean();

    $this->assertEquals($log, "123\n456\nLog\nTest");
  }
}
