<?php
namespace zxc;
// Квадратное уравнение ax^2+bx+c
class Quadratic extends Linear implements \core\EquationInterface
{
	protected $x2;
	protected function dir($a, $b, $c) 
	{
		return $b*$b - 4*$a*$c;
	}
	function solve($a, $b, $c) 
	{
		if($a == 0)
		{
		   return $this->ur($b,$c);
		}
		$dir = $this->dir($a, $b, $c);
		if ($dir > 0) 
		{
			$x = (-1*$b + sqrt($dir))/(2*$a);
			$x2 = (-1*$b - sqrt($dir))/(2*$a);
			$this->x = $x;
			$this->x2 = $x2;
			return array($x, $x2);
		} 
		elseif ($dir == 0) 
		{
			$x = (-1*$b)/(2*$a);
			$this->x = $x;
			return array($x);
		}
		throw new TGException("NET URAVNENIYA");	
	}
}
?>