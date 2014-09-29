<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use InvalidArgumentException;

/**
 * Responsible for constructing rule sets.
 *
 * @package Ve\LogicProcessor
 */
class RuleLibrary
{

	/**
	 * Contains a list of known rule classes indexed by identifier.
	 *
	 * @var string[]
	 */
	protected $rules = [];

	/**
	 * Adds a rule to the library.
	 *
	 * @param string $name
	 * @param string $class
	 */
	public function addRule($name, $class)
	{
		$this->rules[$name] = $class;
	}

	/**
	 * Checks if the given rule is known about.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasRule($name)
	{
		return isset($this->rules[$name]);
	}

	/**
	 * Gets an instance of the given rule.
	 *
	 * @param string $name
	 *
	 * @return AbstractRule
	 */
	public function getRuleInstance($name)
	{
		if ( ! $this->hasRule($name))
		{
			throw new InvalidArgumentException($name . ' is not a known rule.');
		}

		return new $this->rules[$name];
	}

}
