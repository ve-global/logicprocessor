<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Defines a single rule.
 *
 * @package Ve\LogicProcessor
 */
abstract class AbstractRule
{

	/**
	 * Modifier used to test against
	 *
	 * @var AbstractAssertion
	 */
	protected $assertion;

	/**
	 * @return AbstractAssertion
	 */
	public function getAssertion()
	{
		return $this->assertion;
	}

	/**
	 * @param AbstractAssertion $modifier
	 */
	public function setAssertion($modifier)
	{
		$this->assertion = $modifier;
	}

	/**
	 * Evaluates the rule
	 *
	 * @param mixed $context
	 *
	 * @return bool
	 */
	public abstract function run($context);

}
