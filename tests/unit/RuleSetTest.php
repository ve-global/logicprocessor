<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;
use Mockery;
use stdClass;

class RuleSetTest extends Test
{

	/**
	 * @var RuleSet
	 */
	protected $set;

	protected function _before()
	{
		$this->set = new RuleSet;
	}

	public function testGetAndSetRule()
	{
		$rule = new NameRuleStub;

		$this->set->setRule($rule);

		$this->assertEquals($rule, $this->set->getRules());
	}

	public function testValidate()
	{
		$age = 25;
		$context = ['user' => ['age' => $age]];

		$modifier = Mockery::mock('Ve\LogicProcessor\AbstractModifier');

		$modifier->shouldReceive('run')
			->with($age)
			->once()
			->andReturn(true);

		$rule = new NameRuleStub;
		$rule->setModifier($modifier);

		$this->set->setRule($rule);

		$this->assertTrue(
			$this->set->isValid($context)
		);
	}

	public function testApplyMutators()
	{
		$target = new stdClass;

		$mutator = Mockery::mock('Ve\LogicProcessor\AbstractMutator');
		$mutator->shouldReceive('mutate')
			->with($target)
			->once();

		$this->set->addMutator($mutator);
		$this->set->applyMutators($target);
	}

}
