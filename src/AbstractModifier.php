<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Base class for any rule modifiers. These are things such as >, !=, =, etc
 *
 * @package Ve\LogicProcessor
 */
abstract class AbstractModifier
{

	/**
	 * @var mixed
	 */
	protected $targetValue;

	/**
	 * @return mixed
	 */
	public function getTargetValue()
	{
		return $this->targetValue;
	}

	/**
	 * @param mixed $value
	 */
	public function setTargetValue($value)
	{
		$this->targetValue = $value;
	}

	/**
	 * @param mixed $value
	 *
	 * @return bool
	 */
	abstract function run($value);

}
