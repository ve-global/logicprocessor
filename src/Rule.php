<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Defines a single rule.
 *
 * @package Ve\LogicProcessor
 */
class Rule
{

	/**
	 * The entity property to compare against.
	 *
	 * @var string
	 */
	protected $entityProperty;

	/**
	 * Modifier used to test against
	 *
	 * @var AbstractModifier
	 */
	protected $modifier;

	/**
	 * @return string
	 */
	public function getEntityProperty()
	{
		return $this->entityProperty;
	}

	/**
	 * @param string $entityProperty
	 */
	public function setEntityProperty($entityProperty)
	{
		$this->entityProperty = $entityProperty;
	}

	/**
	 * @return AbstractModifier
	 */
	public function getModifier()
	{
		return $this->modifier;
	}

	/**
	 * @param AbstractModifier $modifier
	 */
	public function setModifier($modifier)
	{
		$this->modifier = $modifier;
	}

	/**
	 * Evaluates the rule
	 *
	 * @return bool
	 */
	public function run($entityData)
	{
		// TODO: implement this
	}

}
