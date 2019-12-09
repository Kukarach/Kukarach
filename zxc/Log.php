<?php
namespace zxc;
class Log extends \core\LogAbstract implements \core\LogInterface
{
	public static function log($str) 
	{
		self::Instance()->log[] = $str;
	}
	public function _write() 
	{
		echo $logOut = implode("\n", $this->log);		
		$date = new \DateTime();
		$filename = $date->format("d.m.Y\_H.i.s.u").".log";
		if (!file_exists(__DIR__."/../log/")) {
			mkdir(__DIR__."/../log/", 0777, true);
		}
		$file = fopen(__DIR__."/../log/".$filename, "w+");
		fwrite($file, $logOut);
		//if(!is_dir("./Log")) mkdir ("./Log");

	}
	public static function write() 
	{
		static::Instance()->_write();
	}
}
?>