<?php
/**
 * @author Ve Kraken Development Team
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

}
