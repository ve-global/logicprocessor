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
	 * @var AbstractModifier
	 */
	protected $modifier;

	/***
	 * @var mixed
	 */
	protected $targetValue;

	/**
	 * @return AbstractModifier
	 */
	public function getModifier()
	{
		return $this->modifier;
	}

	/**
	 * @param AbstractModifier $modifier
	 */
	public function setModifier($modifier)
	{
		$this->modifier = $modifier;
	}

	/**
	 * Evaluates the rule
	 *
	 * @param mixed $context
	 *
	 * @return bool
	 */
	public abstract function run($context);

	/**
	 * @return mixed
	 */
	public function getTargetValue()
	{
		return $this->targetValue;
	}

	/**
	 * @param mixed $targetValue
	 */
	public function setTargetValue($targetValue)
	{
		$this->targetValue = $targetValue;
	}

}
