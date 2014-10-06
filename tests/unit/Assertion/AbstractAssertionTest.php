<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Modifier;

use Codeception\TestCase\Test;
use Ve\LogicProcessor\AbstractAssertion;

abstract class AbstractAssertionTest extends Test
{

	/**
	 * Target class to test
	 * @var string
	 */
	protected $className = '';

	/**
	 * @var AbstractAssertion
	 */
	protected $instance;

	protected function _before()
	{
		$this->instance = new $this->className;
	}

	/**
	 * @param mixed $target
	 * @param mixed $value
	 * @param bool  $expected
	 *
	 * @dataProvider testData
	 */
	public function testRun($target, $value, $expected)
	{
		$this->instance->setTargetValue($target);
		$this->assertEquals($expected, $this->instance->run($value));
	}

	/**
	 * Should return sets of data that match the needed data for `testRun()`.
	 *
	 * @return array
	 */
	public abstract function testData();

}
