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
 * Keeps track of mutators and allows them to be constructed.
 *
 * @package Ve\LogicProcessor
 */
class MutatorLibrary
{

	/**
	 * Contains our known mutator classes.
	 *
	 * @var string[]
	 */
	protected $mutators = [];

	/**
	 * Returns true if the given modifier is known about.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function has($name)
	{
		return isset($this->mutators[$name]);
	}

	/**
	 * Adds a new mutator class to the library.
	 *
	 * @param string $name
	 * @param string $class
	 */
	public function add($name, $class)
	{
		$this->mutators[$name] = $class;
	}

	/**
	 * Gets a constructed instance of the given mutator
	 *
	 * @param string $name
	 *
	 * @return AbstractMutator
	 *
	 * @throws InvalidArgumentException
	 */
	public function getInstance($name)
	{
		if ( ! $this->has($name))
		{
			throw new InvalidArgumentException($name . ' is not a known mutator.');
		}

		return new $this->mutators[$name];
	}

}
