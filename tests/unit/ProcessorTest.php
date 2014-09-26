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

}
