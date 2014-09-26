<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Modifier;

use Ve\LogicProcessor\AbstractModifier;

class Equal extends AbstractModifier
{

	/**
	 * @param mixed $value
	 *
	 * @return bool
	 */
	function run($value)
	{
		return $this->getTargetValue() == $value;
	}

}
