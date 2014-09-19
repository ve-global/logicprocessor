<?php

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;

class RuleLibraryTest extends Test
{

	/**
	 * @var RuleLibrary
	 */
	protected $ruleLibrary;

	public function _before()
	{
		$this->ruleLibrary = new RuleLibrary;
	}

	public function testGetSetAndRemoveRule()
	{
		$name = 'foobar';
		$class = 'stdClass';

		$this->assertFalse($this->ruleLibrary->has($name));

		$this->ruleLibrary->add($name, $class);

		$this->assertTrue($this->ruleLibrary->has($name));

		$this->assertEquals(
			$class,
			$this->ruleLibrary->get($name)
		);

		$this->ruleLibrary->remove($name);

		$this->assertFalse($this->ruleLibrary->has($name));
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testGetInvalidRule()
	{
		$this->ruleLibrary->get('does not exist');
	}

	public function testGetInstance()
	{
		$name = 'foobar';
		$class = 'stdClass';

		$this->ruleLibrary->add($name, $class);

		$this->assertInstanceOf(
			$class,
			$this->ruleLibrary->getInstance($name)
		);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testGetInvalidInstance()
	{
		$this->ruleLibrary->getInstance('does not exist');
	}

}
