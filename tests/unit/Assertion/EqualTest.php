<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Assertion;

use Codeception\TestCase\Test;

class EqualTest extends AbstractAssertionTest
{

	protected $className = 'Ve\LogicProcessor\Assertion\Equal';

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
