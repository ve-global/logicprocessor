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
 * Keeps track of modifiers that can be applied to properties.
 *
 * @package Ve\LogicProcessor
 */
class ModifierLibrary extends AbstractLibrary
{

	protected $baseNamespace = 'Ve\LogicProcessor\Modifier\\';

	protected $notFoundError = ' is not a known modifier.';

	/**
	 * Gets an instance of the given modifier.
	 *
	 * @param string $name
	 *
	 * @return AbstractModifier
	 */
	public function getInstance($name)
	{
		$class = $this->getModifierClassName($name);

		return new $class;
	}

	/**
	 * Given a name will return the FQCN of the modifier.
	 *
	 * @param string $name
	 *
	 * @return string
	 */
	protected function getModifierClassName($name)
	{
		if (isset($this->items[$name]))
		{
			return $this->items[$name];
		}

		$className = $this->baseNamespace . ucfirst($name);

		if (! class_exists($className))
		{
			throw new InvalidArgumentException($name . $this->notFoundError);
		}

		return $className;
	}

}
