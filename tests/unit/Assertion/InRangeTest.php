<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Assertion;

use Codeception\TestCase\Test;

class InRangeTest extends AbstractAssertionTest
{

	protected $className = 'Ve\LogicProcessor\Assertion\InRange';

	public function testData()
	{
		return [
			[[1,10], 1, true],
			[[1,10], 5, true],
			[[1,10], 50, false],
			[['a', 'z'], 'j', true],
			[['a', 'z'], 'Z', false],
		];
	}

}
