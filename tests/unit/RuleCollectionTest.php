<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;

class RuleCollectionTest extends Test
{

	/**
	 * @var RuleCollection
	 */
	protected $ruleLibrary;

	public function _before()
	{
		$this->ruleLibrary = new RuleCollection;
	}

	public function testGetSetAndRemoveRule()
	{
		$name = 'foobar';
		$class = 'Ve\LogicProcessor\AbstractRuleStub';

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

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testAddInvalidRule()
	{
		$this->ruleLibrary->add('test', 'stdClass');
	}

	public function testGetInstance()
	{
		$name = 'foobar';
		$class = 'Ve\LogicProcessor\AbstractRuleStub';

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
