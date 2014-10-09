<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use ArrayAccess;
use InvalidArgumentException;
use ReflectionClass;

/**
 * Keeps track of different rule "environments" to be able to quickly and easily construct matching libraries and builders.
 *
 * @package Ve\LogicProcessor
 */
class Manager
{

	/**
	 * Name of the class to use when creating builders
	 *
	 * @var string
	 */
	protected $builderClassName = 'Ve\LogicProcessor\Builder';

	/**
	 * Contains a list of known instances and their related libraries.
	 *
	 * @var array
	 */
	protected $instances = [];

	/**
	 * Adds a new instance that can be constructed. The library values should be an array of name => class, a closure that
	 * returns this or a pre-constructed AbstractLibrary.
	 *
	 * @param string         $name
	 * @param array|Callable $rules
	 * @param array|Callable $assertions
	 * @param array|Callable $results
	 * @param array|Callable $modifiers
	 */
	public function addInstance($name, $rules, $assertions, $results, $modifiers)
	{
		$this->instances[$name] = [
			'rule' => $rules,
			'assertion' => $assertions,
			'result' => $results,
			'modifier' => $modifiers,
		];
	}

	/**
	 * Returns true if the given $name is a known set of libraries.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasInstance($name)
	{
		return isset($this->instances[$name]);
	}

	/**
	 * @param string $name
	 *
	 * @return Builder
	 *
	 * @throws InvalidArgumentException
	 */
	public function getBuilderInstance($name)
	{
		if ( ! $this->hasInstance($name))
		{
			throw new InvalidArgumentException($name. ' is not a known instance.');
		}

		// TODO: Find a more awesome way to do this.
		$libraries = [];
		foreach ($this->instances[$name] as $type => $identifier)
		{
			$libraries[] = $this->createLibrary($identifier, $type);
		}

		$reflectionClass = new ReflectionClass($this->builderClassName);
		return $reflectionClass->newInstanceArgs($libraries);
	}

	/**
	 * Takes the given identifier and tries to turn it into an AbstractLibrary
	 *
	 * If the $identifier is an array then $type is required. $type represents the name of the library class to create
	 * and populate. Eg, "rule" becomes "RuleLibrary".
	 *
	 * @param array|string|Callable $identifier
	 * @param string|null           $type
	 *
	 * @return AbstractLibrary
	 */
	public function createLibrary($identifier, $type = null)
	{
		if (is_array($identifier) || $identifier instanceof ArrayAccess)
		{
			return $this->createFromArray($identifier, $type);
		}

		//
		if (is_callable($identifier))
		{
			return $identifier();
		}

		// If all else fails try to construct the $identifier as a class
		return new $identifier;
	}

	/**
	 * @param array  $array
	 * @param string $type
	 *
	 * @return AbstractLibrary
	 */
	protected function createFromArray($array, $type)
	{
		$libraryClass = 'Ve\LogicProcessor\\'.ucfirst($type).'Library';

		/** @type AbstractLibrary $library */
		$library = new $libraryClass;

		// TODO: Update the add function to take a single array for optimisations
		foreach ($array as $name => $class)
		{
			$library->add($name, $class);
		}

		return $library;
	}

}
