<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Assertion;

use Ve\LogicProcessor\AbstractAssertion;

/**
 * Checks if the value is in the range defined by the target value.
 * The target value should be an array with two elements, the start of the range and the end of the range.
 * These should be values compatible with range().
 *
 * @package Ve\LogicProcessor\Assertion
 */
class InRange extends AbstractAssertion
{

	/**
	 * @param mixed $value
	 *
	 * @return bool
	 */
	function run($value)
	{
		$range = range($this->getTargetValue()[0], $this->getTargetValue()[1]);
		return in_array($value, $range);
	}

}
