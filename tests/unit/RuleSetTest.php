<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;
use Mockery;

class RuleSetTest extends Test
{

	/**
	 * @var RuleSet
	 */
	protected $set;

	protected function _before()
	{
		$this->set = new RuleSet;
	}

	public function testGetAndSetRule()
	{
		$rule = new Rule;

		$this->set->setRule($rule);

		$this->assertEquals($rule, $this->set->getRule());
	}

}
