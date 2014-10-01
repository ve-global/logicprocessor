<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Rule;

class AndRule extends AbstractLogicRule
{

	/**
	 * {@inheritdoc}
	 */
	public function run($context)
	{
		return $this->left->run($context) && $this->right->run($context);
	}

}
