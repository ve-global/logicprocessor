<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor\Rule;

use Rule\AbstractRuleTest;

class OrRuleTest extends AbstractRuleTest
{

	protected $class = 'Ve\LogicProcessor\Rule\OrRule';

	public function getTruthTable()
	{
		return [
			[false, false, false],
			[true, false, true],
			[false, true, true],
			[true, true, true],
		];
	}

}
