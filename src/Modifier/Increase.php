<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Modifier;

use Ve\LogicProcessor\AbstractModifier;

class Increase extends AbstractModifier
{

	/**
	 * @param int $value
	 *
	 * @return int
	 */
	function run($value)
	{
		return $value + $this->getTargetValue();
	}

}
