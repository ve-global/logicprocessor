<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

class RuleSet
{

	/**
	 * @var AbstractRule
	 */
	protected $rule;

	/**
	 * @var AbstractMutator[]
	 */
	protected $mutators = [];

	/**
	 * @return AbstractRule
	 */
	public function getRules()
	{
		return $this->rule;
	}

	/**
	 * @param AbstractRule $rule
	 */
	public function setRule(AbstractRule $rule)
	{
		$this->rule = $rule;
	}

	/**
	 * Adds a mutator that will be called as a result of the RuleSet being valid.
	 *
	 * @param AbstractMutator $mutator
	 */
	public function addMutator(AbstractMutator $mutator)
	{
		$this->mutators[] = $mutator;
	}

	/**
	 * Returns true if the rule is valid for the given context
	 *
	 * @param mixed $context
	 *
	 * @return bool
	 */
	public function isValid($context)
	{
		return $this->rule->run($context);
	}

	/**
	 * Applies the mutators for this rule to the target.
	 *
	 * @param mixed $target
	 */
	public function applyMutators($target)
	{
		foreach ($this->mutators as $mutator)
		{
			$mutator->mutate($target);
		}
	}

}
