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
		echo implode("\n", $this->log);
	}
	public static function write() 
	{
		static::Instance()->_write();
	}
}
?>