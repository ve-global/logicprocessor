<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

class NameRuleStub extends AbstractRule
{

	/**
	 * {@inheritdoc}
	 */
	public function run($context)
	{
		return isset($context['user']['age']) && $this->modifier->run($context['user']['age']);
	}
}
