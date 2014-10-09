<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

interface LibraryInterface
{

	/**
	 * Adds a rule to the library.
	 *
	 * @param string $name
	 * @param string $class
	 */
	public function add($name, $class);

	/**
	 * Checks if the given rule is known about.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function has($name);

	/**
	 * Gets an instance of the given item.
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function getInstance($name);

}
