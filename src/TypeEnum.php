<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Defines set types for properties and modifiers.
 *
 * @package Ve\LogicProcessor
 */
final class TypeEnum
{

	public static $STRING = 0;
	public static $NUMBER = 1;
	public static $DATE = 2;

	public static $nameMap = [
		0 => 'string',
		1 => 'number',
		2 => 'date',
	];

	/**
	 * Given a defined type will return a string name for that type.
	 *
	 * @param int $type
	 *
	 * @return string
	 */
	public static function toString($type)
	{
		return static::$nameMap[$type];
	}

	/**
	 * Given a name will convert to a type constant.
	 *
	 * @param int $name
	 *
	 * @return string
	 */
	public static function fromString($name)
	{
		$values = array_flip(static::$nameMap);
		return $values[$name];
	}

}
