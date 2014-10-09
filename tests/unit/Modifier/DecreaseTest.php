<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Modifier;

class DecreaseTest extends AbstractModifierTest
{

	protected $className = 'Ve\LogicProcessor\Modifier\Decrease';

	/**
	 * Should return sets of data that match the needed data for `testRun()`.
	 *
	 * @return array
	 */
	public function testData()
	{
		return [
			[50, 100, 50],
		];
	}
}
