<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Modifier;

use Ve\LogicProcessor\AbstractModifier;

/**
 * Returns a fixed value
 *
 * @package Ve\LogicProcessor\Modifier
 */
class Fixed extends AbstractModifier
{

	/**
	 * @param mixed $value
	 *
	 * @return mixed
	 */
	function run($value)
	{
		return $this->getTargetValue();
	}

}
