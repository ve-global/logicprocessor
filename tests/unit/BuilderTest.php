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
use Ve\LogicProcessor\Rule\AndRule;

class BuilderTest extends Test
{

	/**
	 * @var Builder
	 */
	protected $builder;

	/**
	 * @var RuleLibrary
	 */
	protected $ruleLibrary;

	/**
	 * @var AssertionLibrary
	 */
	protected $assertionLibrary;

	/**
	 * @var ResultLibrary
	 */
	protected $resultLibrary;

	/**
	 * @var ModifierLibrary
	 */
	protected $modifierLibrary;

	protected function _before()
	{
		$this->ruleLibrary = new RuleLibrary;
		$this->assertionLibrary = new AssertionLibrary;
		$this->resultLibrary = new ResultLibrary;
		$this->modifierLibrary = new ModifierLibrary();

		$this->builder = new Builder(
			$this->ruleLibrary,
			$this->assertionLibrary,
			$this->resultLibrary,
			$this->modifierLibrary
		);
	}

	public function testBuildRule()
	{
		$ruleName = 'test_rule';

		$data = [
			'name' => $ruleName,
			'assertion' => 'equal',
			'value' => 123,
		];

		$this->ruleLibrary->add($ruleName, 'Ve\LogicProcessor\Rule\AndRule');

		$rule = $this->builder->buildRule($data);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Rule\AndRule',
			$rule
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Assertion\Equal',
			$rule->getAssertion()
		);

		$this->assertEquals(
			123,
			$rule->getAssertion()->getTargetValue()
		);

	}

	public function testBuildLogicalRule()
	{
		$ruleName = 'and';

		$data = [
			'name' => $ruleName,
			'left' => [
				'name' => 'and',
			],
			'right' => [
				'name' => 'and',
			],
		];

		$this->ruleLibrary->add($ruleName, 'Ve\LogicProcessor\Rule\AndRule');

		/** @var AndRule $rule */
		$rule = $this->builder->buildRule($data);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Rule\AndRule',
			$rule
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Rule\AndRule',
			$rule->getLeft()
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Rule\AndRule',
			$rule->getRight()
		);
	}

	public function testBuildResult()
	{
		$name = 'test';
		$class = 'Ve\LogicProcessor\OrderDiscountResult';
		$value = 'some value';

		$this->resultLibrary->add($name, $class);

		$result = $this->builder->buildResult([
				'name' => $name,
				'value' => $value,
				'modifier' => 'percent',
				'target' => 25,
			]);

		$this->assertInstanceOf(
			$class,
			$result
		);

		$this->assertEquals(
			$value,
			$result->getValue()
		);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Modifier\Percent',
			$result->getModifier()
		);

		$this->assertEquals(
			25,
			$result->getModifier()->getTargetValue()
		);
	}

	public function testBuildSet()
	{
		$identifier = 'foobar';
		$data = [
			'identifier' => $identifier,
			'rule' => [
				'name' => 'and',
			],
		];

		$this->ruleLibrary->add('and', 'Ve\LogicProcessor\Rule\AndRule');

		$set = $this->builder->buildRuleSet($data);

		$this->assertInstanceOf(
			'Ve\LogicProcessor\RuleSet',
			$set
		);

		$this->assertEquals(
			$identifier,
			$set->getIdentifier()
		);
	}
}
