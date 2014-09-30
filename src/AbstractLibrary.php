<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use InvalidArgumentException;

class AbstractLibrary
{

	protected $notFoundError = ' is not a known item.';

	/**
	 * Contains a list of known rule classes indexed by identifier.
	 *
	 * @var string[]
	 */
	protected $items = [];

	/**
	 * Adds a rule to the library.
	 *
	 * @param string $name
	 * @param string $class
	 */
	public function add($name, $class)
	{
		$this->items[$name] = $class;
	}

	/**
	 * Checks if the given rule is known about.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function has($name)
	{
		return isset($this->items[$name]);
	}

	/**
	 * Gets an instance of the given item.
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function getInstance($name)
	{
		if ( ! $this->has($name))
		{
			throw new InvalidArgumentException($name . $this->notFoundError);
		}

		return new $this->items[$name];
	}

}
