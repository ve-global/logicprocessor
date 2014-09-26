<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;
use InvalidArgumentException;

class RuleFactoryTest extends Test
{

	/**
	 * @var RuleFactory
	 */
	protected $library;

	protected function _before()
	{
		$this->library = new RuleFactory;
	}

	public function testSetAndHas()
	{
		$name = 'foobar';
		$class = 'stdClass';

		$this->assertFalse(
			$this->library->hasRule($name)
		);

		$this->library->addRule($name, $class);

		$this->assertTrue(
			$this->library->hasRule($name)
		);
	}

	public function testGetInstance()
	{
		$name = 'foobar';
		$class = 'stdClass';

		$this->library->addRule($name, $class);

		$this->assertInstanceOf(
			$class,
			$this->library->getRuleInstance($name)
		);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testGetInvalidInstance()
	{
		$this->library->getRuleInstance('not here');
	}

}
