<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Indicates that an object can provide a list of columns for an entity.
 *
 * @package Ve\LogicProcessor
 */
interface EntityDefinitionInterface
{

	/**
	 * Should return true if the entity contains the given property.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasProperty($name);

	/**
	 * Should return an array where the keys are the names of properties and the value is one or more types that apply
	 * to the property.
	 *
	 * ['foo' => TypeEnum::$STRING, 'bar' => [TypeEnum::$STRING, TypeEnum::$NUMBER]]
	 *
	 * @return array
	 */
	public function getProperties();

}
