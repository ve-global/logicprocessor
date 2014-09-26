<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Keeps track of modifiers that can be applied to properties.
 *
 * @package Ve\LogicProcessor
 */
class ModifierLibrary
{

	protected $baseNamespace = 'Ve\LogicProcessor\Modifier\\';

	protected $classNames = [];

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
	 * Adds a custom modifier.
	 *
	 * @param string $name
	 * @param string $class
	 */
	public function addModifier($name, $class)
	{
		$this->classNames[$name] = $class;
	}

	/**
	 * Given a name will return the FQNS of the modifier.
	 *
	 * @param string $name
	 *
	 * @return string
	 */
	protected function getModifierClassName($name)
	{
		if (isset($this->classNames[$name]))
		{
			return $this->classNames[$name];
		}
		return $this->baseNamespace . ucfirst($name);
	}

}
