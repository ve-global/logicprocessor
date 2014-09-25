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
interface EntityCollectionInterface
{

	/**
	 * Checks if the given entity is in the collection.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasEntity($name);

	/**
	 * Gets an instance of the named entity definition
	 *
	 * @param string $name
	 *
	 * @return EntityDefinitionInterface
	 *
	 * @throws InvalidArgumentException If the $name is not a known entity
	 */
	public function getEntity($name);


	/**
	 * Should return true if the given name represents a valid entity and a valid property.
	 *
	 * @param string $name Should be in the format "entity_name.property"
	 *
	 * @return bool
	 */
	public function hasEntityProperty($name);

}
