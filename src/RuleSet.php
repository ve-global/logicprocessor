<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Defines a set of logical rules and an outcome
 *
 * @package Ve\LogicProcessor
 */
class RuleSet
{

	/**
	 * @var AbstractRule[]
	 */
	protected $rules = [];

	protected $actions = [];

	public function addRule(AbstractRule $rule)
	{
		$this->rules[] = $rule;
	}

	public function run()
	{

	}

}
