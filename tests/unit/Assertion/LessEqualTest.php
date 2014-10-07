<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Assertion;

use Codeception\TestCase\Test;

class LessEqualTest extends AbstractAssertionTest
{

	protected $className = 'Ve\LogicProcessor\Assertion\LessEqual';

	public function testData()
	{
		return [
			[1, 1, true],
			[100, 1, true],
			[1, 2, false],
			[2, 123, false],
		];
	}

}
