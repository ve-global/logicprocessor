<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use InvalidArgumentException;

abstract class AbstractFindingLibrary extends AbstractLibrary
{

	protected $baseNamespace = '';

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

		if ( ! class_exists($className))
		{
			throw new InvalidArgumentException($name . $this->notFoundError);
		}

		return $className;
	}

	/**
	 * Gets an instance of the given modifier.
	 *
	 * @param string $name
	 *
	 * @return AbstractAssertion
	 */
	public function getInstance($name)
	{
		$class = $this->getModifierClassName($name);

		return new $class;
	}

}
