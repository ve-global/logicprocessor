<?php
/**
 * @author Ve Kraken Development Team
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
	 * @return AbstractRule
	 */
	public function getRule()
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

	}

}
