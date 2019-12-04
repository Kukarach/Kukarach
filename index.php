<?php
class TerGriException extends RuntimeException {
}
class A {
	protected $a;
	protected $b;
	protected $x;
	function __construct($a, $b){
		$this->a=$a;
		$this->b=$b;
	}
	function step($a, $b){
		if ($a != 0) {
			$x = -1*$b/$a;
			$this->x = $x;
			return array ($x);
		}
		throw new TerGriException ("нет решения");	
	}
}
class B extends A{
	protected $c;
	protected $x2;
	function __construct($a, $b, $c){
		parent::__construct($a, $b);
		$this->c=$c;
	}
	protected function dis($a, $b, $c) {
		$dis = $b*$b - 4*$a*$c;
		return $dis;
	}
	function step2($a, $b, $c) {
		if ($a==0) {
			return $this->step($a,$b);
		}
		$dis = $this->dis();
		if ($dis >0){
			$x = (-1*$b + sqrt($dis))/(2*$a);
			$x2 = (-1*$b - sqrt($dis))/(2*$a);
			$this->x = $x;
			$this->x2 = $x2;
			return array($x, $x2);
		} else ($dis = 0) {
			$x = (-1*$b)/(2*$a);
			$this->x = $x;
			return array($x);
		}
		throw new TerGriException ("нет решения");
	}
}
?>























