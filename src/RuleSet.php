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
	 * Something that can be used to identify this set.
	 * @var string
	 */
	protected $identifier;

	/**
	 * @var AbstractResult[]
	 */
	protected $results = [];

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
	 * Adds a result that will be called as a result of the RuleSet being valid.
	 *
	 * @param AbstractResult $result
	 */
	public function addResult(AbstractResult $result)
	{
		$this->results[] = $result;
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
	 * Applies the results for this rule to the target.
	 *
	 * @param mixed $target
	 */
	public function applyResults(&$target)
	{
		foreach ($this->results as $mutator)
		{
			$mutator->mutate($target);
		}
	}

	/**
	 * @return string
	 */
	public function getIdentifier()
	{
		return $this->identifier;
	}

	/**
	 * @param string $identifier
	 */
	public function setIdentifier($identifier)
	{
		$this->identifier = $identifier;
	}

}
