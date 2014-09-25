<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Main class for processing sets of logical rules
 *
 * @package Ve\LogicProcessor
 */
class Processor
{

	/**
	 * @var RuleSet[]
	 */
	protected $ruleSets = [];

	/**
	 * Adds a rule set for evaluation.
	 *
	 * @param RuleSet $rule
	 *
	 * @return $this
	 */
	public function addRuleSet(RuleSet $rule)
	{
		$this->ruleSets[] = $rule;
		return $this;
	}

	/**
	 * Runs the assigned rules against the given $context and applies mutators to $target for any that where found to be
	 * valid.
	 *
	 * @param mixed $context
	 * @param mixed $target
	 */
	public function run($context, $target)
	{
		$validSets = $this->getValidRuleSets($context);

		// Loop over each valid set and apply its mutator
		foreach ($validSets as $set)
		{
			$set->applyMutators($target);
		}
	}

	/**
	 * Returns a list of rule sets that are valid for the given context. If an empty array was found it means that none
	 * of the rule sets was found to be valid.
	 *
	 * @param mixed $context
	 *
	 * @return RuleSet[]
	 */
	public function getValidRuleSets($context)
	{
		$validSets = [];

		// Loop over each set
		foreach ($this->ruleSets as $ruleSet)
		{
			// Build up a list of valid sets
			if ($ruleSet->isValid($context))
			{
				$validSets[] = $ruleSet;
			}
		}

		return $validSets;
	}

}
