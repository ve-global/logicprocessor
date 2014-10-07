<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Assertion;

use Codeception\TestCase\Test;

class LessTest extends AbstractAssertionTest
{

	protected $className = 'Ve\LogicProcessor\Assertion\Less';

	public function testData()
	{
		return [
			[1, 1, false],
			[100, 1, true],
			[1, 2, false],
			[2, 123, false],
		];
	}

}
