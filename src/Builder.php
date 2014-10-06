<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use Ve\LogicProcessor\Rule\AbstractLogicRule;

/**
 * Responsible for constructing sets of rules from formatted arrays.
 *
 * @package Ve\LogicProcessor
 */
class Builder
{

	/**
	 * @var RuleLibrary
	 */
	protected $ruleLibrary;

	/**
	 * @var AssertionLibrary
	 */
	protected $modifierLibrary;

	public function __construct(RuleLibrary $ruleLibrary, AssertionLibrary $modifierLibrary)
	{
		$this->ruleLibrary = $ruleLibrary;
		$this->modifierLibrary = $modifierLibrary;
	}

	/**
	 * Populates the given processor with the rule sets as outlined in the $data.
	 *
	 * @param array     $data
	 * @param Processor $processor
	 *
	 * @return Processor
	 */
	public function build($data, Processor $processor = null)
	{
		if ($processor === null)
		{
			$processor = new Processor;
		}

		// Pull out the rule sets and build each one
		if (isset($data['rule_sets']))
		{
			foreach ($data['rule_sets'] as $set)
			{
				$processor->addRuleSet($this->buildRuleSet($set));
			}
		}

		return $processor;
	}

	public function buildRuleSet($data)
	{
		$ruleSet = new RuleSet;

		if (isset($data['identifier']))
		{
			$ruleSet->setIdentifier($data['identifier']);
		}

		// Build the rule
		if (isset($data['rule']))
		{
			$ruleSet->setRule($this->buildRule($data['rule']));
		}

		// TODO: Loop over each result and build that too

		return $ruleSet;
	}

	/**
	 * Builds a rule.
	 *
	 * Expects an array with a key called "name". If "assertion" is set the $data array will be passed to `buildAssertion`
	 * and the resulting modifier will be added to the rule.
	 *
	 * @param array $data
	 *
	 * @return AbstractRule
	 */
	public function buildRule($data)
	{
		// Extract the name and create an instance
		/** @type AbstractRule $rule */
		$rule = $this->ruleLibrary->getInstance($data['name']);

		// If the rule is a logical rule then make sure the left and right have been added
		if ($rule instanceof AbstractLogicRule)
		{
			$this->populateLogicRule($rule, $data);
		}

		// Build the assertion and set its value before adding it to the rule
		if (isset($data['assertion']))
		{
			$rule->setAssertion($this->buildAssertion($data));
		}

		return $rule;
	}

	/**
	 * Sets up the left and right rules of a logic rule.
	 *
	 * @param AbstractLogicRule $rule
	 * @param array             $data
	 */
	protected function populateLogicRule(AbstractLogicRule $rule, $data)
	{
		if (isset($data['left']))
		{
			$rule->setLeft($this->buildRule($data['left']));
		}

		if (isset($data['right']))
		{
			$rule->setRight($this->buildRule($data['right']));
		}
	}

	/**
	 * Builds a modifier.
	 *
	 * Expects an array with a "modifier" key with the name of the modifier and an optional "value" that will be passed
	 * as the modifier target value if set.
	 *
	 * @param array $data
	 *
	 * @return AbstractAssertion
	 */
	public function buildAssertion($data)
	{
		$modifier = $this->modifierLibrary->getInstance($data['assertion']);

		if (isset($data['value']))
		{
			$modifier->setTargetValue($data['value']);
		}

		return $modifier;
	}

	public function buildResult($data)
	{
		// Get the name and try to create an instance from the library
	}

}
