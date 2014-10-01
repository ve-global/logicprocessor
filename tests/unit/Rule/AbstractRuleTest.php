<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Rule;

use Codeception\TestCase\Test;

abstract class AbstractRuleTest extends Test
{

	/**
	 * @var string Class to test
	 */
	protected $class;

	abstract function getTruthTable();

	/**
	 * @param bool $left     If the left rule should fail or not
	 * @param bool $right    If the right rule should fail or not
	 * @param bool $expected What the outcome should be
	 *
	 * @dataProvider getTruthTable
	 */
	public function testRuleLogic($left, $right, $expected)
	{
		$context = [];

		$leftRule = \Mockery::mock('Ve\LogicProcessor\AbstractRule');
		$leftRule->shouldReceive('run')
			->with($context)
			->andReturn($left);

		$rightRule = \Mockery::mock('Ve\LogicProcessor\AbstractRule');
		$rightRule->shouldReceive('run')
			->with($context)
			->andReturn($right);

		$rule = new $this->class;
		$rule->setLeft($leftRule);
		$rule->setRight($rightRule);

		$this->assertEquals(
			$expected,
			$rule->run($context)
		);
	}

}
