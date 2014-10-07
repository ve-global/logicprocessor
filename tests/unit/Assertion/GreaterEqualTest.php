<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Assertion;

use Codeception\TestCase\Test;

class GreaterEqualTest extends AbstractAssertionTest
{

	protected $className = 'Ve\LogicProcessor\Assertion\GreaterEqual';

	public function testData()
	{
		return [
			[1, 1, true],
			[100, 1, false],
			[1, 2, true],
			[2, 123, true],
		];
	}

}
