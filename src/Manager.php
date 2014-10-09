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
	 * Contains a list of known environments and their related libraries.
	 *
	 * @var array
	 */
	protected $environments = [];

	/**
	 * Adds a new environment that can be constructed. The library values should be an array of name => class, a closure that
	 * returns this or a pre-constructed AbstractLibrary.
	 *
	 * @param string         $name
	 * @param array|Callable $rules
	 * @param array|Callable $assertions
	 * @param array|Callable $results
	 * @param array|Callable $modifiers
	 */
	public function addEnvironment($name, $rules, $assertions, $results, $modifiers)
	{
		$this->environments[$name] = [
			'rule' => $rules,
			'assertion' => $assertions,
			'result' => $results,
			'modifier' => $modifiers,
		];
	}

	/**
	 * Returns true if the given $name is a known environment.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasEnvironment($name)
	{
		return isset($this->environments[$name]);
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
		if ( ! $this->hasEnvironment($name))
		{
			throw new InvalidArgumentException($name. ' is not a known instance.');
		}

		// TODO: Find a more awesome way to do this.
		$libraries = [];
		foreach ($this->environments[$name] as $type => $identifier)
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
	 * @return LibraryInterface
	 */
	public function createLibrary($identifier, $type = null)
	{
		if (is_array($identifier) || $identifier instanceof ArrayAccess)
		{
			return $this->createFromArray($identifier, $type);
		}

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
	 * @return LibraryInterface
	 */
	protected function createFromArray($array, $type)
	{
		$libraryClass = 'Ve\LogicProcessor\\'.ucfirst($type).'Library';

		/** @type LibraryInterface $library */
		$library = new $libraryClass;

		// TODO: Update the add function to take a single array for optimisations
		foreach ($array as $name => $class)
		{
			$library->add($name, $class);
		}

		return $library;
	}

}
