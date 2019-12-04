<?php
	class A{
	}
	class B{	
		public a;
		public b;
		function __construct($a, $b){
			$this->a=$a;
			$this->b=$b;
		}
	}
	class C extends B{
		public c;
		function __construct($a, $b, $c){
			parent::__construct($a, $b);
			$this->c=$c;
		}
	}

	$a = new C(new A(), new A(), new B(new A(), new A()));