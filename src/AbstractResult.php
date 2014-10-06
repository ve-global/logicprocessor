<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Common logic for classes that mutate entities in various ways.
 *
 * @package Ve\LogicProcessor
 */
abstract class AbstractResult
{

	/**
	 * A value that the result can check things against
	 * @var mixed
	 */
	protected $value;

	/**
	 * @var AbstractAssertion
	 */
	protected $modifier;

	public abstract function mutate(&$target);

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * @return AbstractAssertion
	 */
	public function getModifier()
	{
		return $this->modifier;
	}

	/**
	 * @param AbstractAssertion $modifier
	 */
	public function setModifier($modifier)
	{
		$this->modifier = $modifier;
	}

}
