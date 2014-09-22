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
 * Keeps track of entities and their properties
 *
 * @package Ve\LogicProcessor
 */
class EntityCollection
{

	/**
	 * @var array
	 */
	protected $entities = [];

	/**
	 * FQCN of the interface to use for providing entity properties
	 * @var string
	 */
	protected $entityInterface = 'Ve\LogicProcessor\EntityDefinitionInterface';

	/**
	 * Adds a new entity.
	 *
	 * @param string|EntityDefinitionInterface $name
	 * @param string $class
	 *
	 * @return $this
	 */
	public function add($name, $class)
	{
		if ( ! is_subclass_of($class, $this->entityInterface))
		{
			throw new InvalidArgumentException($class . ' must implement '.$this->entityInterface);
		}

		$this->entities[$name] = $class;

		return $this;
	}

	/**
	 * Checks if the given entity is in the collection.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function has($name)
	{
		return isset($this->entities[$name]);
	}

	/**
	 * Gets an instance of the named entity definition
	 *
	 * @param string $name
	 *
	 * @return EntityDefinitionInterface
	 *
	 * @throws InvalidArgumentException
	 */
	public function get($name)
	{
		if ( ! $this->has($name))
		{
			throw new InvalidArgumentException($name . ' is not a known entity definition provider.');
		}

		$class = $this->entities[$name];

		if (is_string($class))
		{
			$class = new $class;
		}

		return $class;
	}

}
