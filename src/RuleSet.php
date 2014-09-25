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
	 * @var Rule
	 */
	protected $rule;

	/**
	 * @return Rule
	 */
	public function getRule()
	{
		return $this->rule;
	}

	/**
	 * @param Rule $rule
	 */
	public function setRule(Rule $rule)
	{
		$this->rule = $rule;
	}

}
