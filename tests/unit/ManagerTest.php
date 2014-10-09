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

class ManagerTest extends Test
{

	/**
	 * @var Manager
	 */
	protected $manager;

	protected function _before()
	{
		$this->manager = new Manager;
	}

	public function testGetAndHasInstance()
	{
		$name = 'test';

		$this->assertFalse(
			$this->manager->hasEnvironment($name)
		);

		$this->manager->addEnvironment($name, [], [], [], []);

		$this->assertTrue(
			$this->manager->hasEnvironment($name)
		);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testGetInvalidInstance()
	{
		$this->manager->getBuilderInstance('not here');
	}

	public function testGetInstance()
	{
		$name = 'foobar';

		$this->manager->addEnvironment($name, [], [], [], []);

		$builder = $this->manager->getBuilderInstance($name);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Builder',
			$builder
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\RuleLibrary',
			$builder->getRuleLibrary()
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\AssertionLibrary',
			$builder->getAssertionLibrary()
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\ResultLibrary',
			$builder->getResultLibrary()
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\ModifierLibrary',
			$builder->getModifierLibrary()
		);
	}

	public function testCreateLibraryFromClosure()
	{
		$result = $this->manager->createLibrary(function(){
				return new RuleLibrary;
			});

		$this->assertInstanceOf(
			'Ve\LogicProcessor\RuleLibrary',
			$result
		);
	}

	public function testCreateLibraryFromString()
	{
		$result = $this->manager->createLibrary('Ve\LogicProcessor\RuleLibrary');

		$this->assertInstanceOf(
			'Ve\LogicProcessor\RuleLibrary',
			$result
		);
	}

	public function testCreateLibraryFromArray()
	{
		$result = $this->manager->createLibrary(
			[
				'testRule' => 'Ve\LogicProcessor\Rule\And',
			],
			'rule'
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\RuleLibrary',
			$result
		);

		$this->assertTrue(
			$result->has('testRule')
		);
	}

}
