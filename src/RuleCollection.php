<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use InvalidArgumentException;

/**
 * Contains a collection of rules.
 *
 * @package Ve\LogicProcessor
 */
class RuleCollection
{

	/**
	 * @var string[]
	 */
	protected $rules;

	/**
	 * Adds a rule to the library.
	 *
	 * @param string $rule
	 * @param string $class
	 *
	 * @return $this
	 */
	public function add($rule, $class)
	{
		if ( ! is_subclass_of($class, 'Ve\LogicProcessor\AbstractRule'))
		{
			throw new InvalidArgumentException($class.' does not extend AbstractRule.');
		}

		$this->rules[$rule] = $class;
		return $this;
	}

	/**
	 * Checks if the named rule is one that the library knows about.
	 *
	 * @param string $rule
	 *
	 * @return boolean
	 */
	public function has($rule)
	{
		return isset($this->rules[$rule]);
	}

	/**
	 * Removes a rule from the library.
	 *
	 * @param string $rule
	 *
	 * return $this
	 */
	public function remove($rule)
	{
		unset($this->rules[$rule]);
		return $this;
	}

	/**
	 * Gets the given rule.
	 *
	 * @param string $rule
	 *
	 * @return string
	 *
	 * @throws InvalidArgumentException
	 */
	public function get($rule)
	{
		if ( ! $this->has($rule))
		{
			throw new InvalidArgumentException($rule.' is not a known rule.');
		}

		return $this->rules[$rule];
	}

	/**
	 * Gets a constructed rule instance
	 *
	 * @param string $rule
	 *
	 * @return AbstractRule
	 *
	 * @throws InvalidArgumentException
	 */
	public function getInstance($rule)
	{
		if ( ! $this->has($rule))
		{
			throw new InvalidArgumentException($rule.' is not a known rule.');
		}

		$class = $this->rules[$rule];
		return new $class($this);
	}

}
