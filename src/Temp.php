<?php 

namespace Goszowski\Temp;

class Temp {

	protected static $tmpVarname = 'goszowski-temp-storage';



	// Check key existing in temp variable
	public static function exists($key)
	{
		return isset($GLOBALS[self::$tmpVarname][$key]);
	}

	// Get value by key in temp variable
	public static function get($key)
	{
		if(self::exists($key))
		{
			return $GLOBALS[self::$tmpVarname][$key];
		}

		return null;
	}

	// Put key and value to temp variable
	public static function put($key, $value)
	{
		$GLOBALS[self::$tmpVarname][$key] = $value;
		return self::get($key);
	}

	// Destroy key from temp variable
	public static function destroy($key)
	{
		if(self::exists($key))
		{
			unset($GLOBALS[self::$tmpVarname][$key]);
		}

		return null;
	}

	// Flash all keys in temp variable
	public static function flash()
	{
		$GLOBALS[self::$tmpVarname] = [];
		return null;
	}
}