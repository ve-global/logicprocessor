<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Rule;

use Ve\LogicProcessor\AbstractRule;

/**
 * Common logic for logical comparison rules.
 *
 * @package Ve\LogicProcessor\Rule
 */
abstract class AbstractLogicRule extends AbstractRule
{

	/**
	 * @var AbstractRule
	 */
	protected $left;

	/**
	 * @var AbstractRule
	 */
	protected $right;

	/**
	 * @param AbstractRule $right
	 */
	public function setRight($right)
	{
		$this->right = $right;
	}

	/**
	 * @param AbstractRule $left
	 */
	public function setLeft($left)
	{
		$this->left = $left;
	}

	/**
	 * @return AbstractRule
	 */
	public function getRight()
	{
		return $this->right;
	}

	/**
	 * @return AbstractRule
	 */
	public function getLeft()
	{
		return $this->left;
	}

}
