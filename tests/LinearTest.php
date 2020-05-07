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

final class LinearTest extends TestCase
{
  public function testLinear1(): void
  {
    $solver = new zxc\Linear();
    $root = $solver->ur(1, 2);

    $this->assertEquals($root, [-2]);
  }

  public function testLinear2(): void
  {
    $this->expectException(zxc\TGException::class);
    
    $solver = new zxc\Linear();
    $root = $solver->ur(0, 0);
  }

  public function testLinear3(): void
  {
    $solver = new zxc\Linear();
    $root = $solver->ur(3, 12);

    $this->assertEquals($root, [-4]);
  }
}
