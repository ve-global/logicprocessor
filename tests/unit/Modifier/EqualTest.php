<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Modifier;

use Codeception\TestCase\Test;

class EqualTest extends AbstractModifierTest
{

	protected $className = 'Ve\LogicProcessor\Modifier\Equal';

	public function testData()
	{
		return [
			[1, 1, true],
			[1, 2, false],
			["123", 2, false],
			["2", 2, true],
			[2, "2", true],
		];
	}

}
