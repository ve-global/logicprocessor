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

class ProcessorTest extends Test
{

	/**
	 * @var Processor
	 */
	protected $processor;

	protected function _before()
	{
		$this->processor = new Processor;
	}

	public function testGetValidRuleSets()
	{
		$context = ['user' => ['age' => 25]];

		list($validSet, $invalidSet) = $this->addRuleSetMocks($context);

		$this->processor->addRuleSet($validSet);
		$this->processor->addRuleSet($invalidSet);

		$this->assertEquals(
			[$validSet],
			$this->processor->getValidRuleSets($context)
		);
	}

	public function testRun()
	{
		$context = ['user' => ['age' => 25]];
		$target = new stdClass;

		list($validSet, $invalidSet) = $this->addRuleSetMocks($context);

		$validSet->shouldReceive('applyMutators')
			->with($target)
			->once();

		$invalidSet->shouldReceive('applyMutators')
			->never();

		$this->processor->addRuleSet($validSet);
		$this->processor->addRuleSet($invalidSet);

		$this->processor->run($context, $target);
	}

	protected function addRuleSetMocks($context)
	{
		$validSet = Mockery::mock('Ve\LogicProcessor\RuleSet');
		$validSet->shouldReceive('isValid')
			->with($context)
			->andReturn(true)
			->once();

		$invalidSet = Mockery::mock('Ve\LogicProcessor\RuleSet');
		$invalidSet->shouldReceive('isValid')
			->with($context)
			->andReturn(false)
			->once();

		return [$validSet, $invalidSet];
	}

	/**
	 * Performs an actual logical check without mocks as a form of integration test.
	 */
	protected function testFullRuleRun()
	{
		$set = new RuleSet();

		// Set up and add a rule
		$rule = new HasProdRule();
		$modifier = new Modifier\Equal;
		$modifier->setTargetValue(10);
		$rule->setModifier($modifier);
		$set->setRule($rule);

		// Set up and add a result
		$result = new OrderDiscountResult;
		$result->setValue(10.00);
		$set->addMutator($result);

		$context = [
			'products' => [
				['id' => 1, 'qty' => 10, 'price' => 10.00,],
			],
		];

		$target = new stdClass;
		$target->total = 50.00;

		// Check the rule can be valid
		$this->processor->addRuleSet($rule);
		$this->processor->run($context, $target);

		$this->assertEquals(
			10.00,
			$target->total
		);

		// Check the rule can be false
		$target->total = 50.00;
		$context['products'][0]['qty'] = 5;

		$this->processor->run($context, $target);

		$this->assertEquals(
			50.00,
			$target->total
		);
	}

}
