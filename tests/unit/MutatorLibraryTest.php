<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;
use InvalidArgumentException;

class MutatorLibraryTest extends Test
{

	/**
	 * @var MutatorLibrary
	 */
	protected $library;

	protected function _before()
	{
		$this->library = new MutatorLibrary;
	}

	public function testAddAndHas()
	{
		$name = 'somemutator';
		$class = 'stdClass';

		$this->assertFalse(
			$this->library->has($name)
		);

		$this->library->add($name, $class);

		$this->assertTrue(
			$this->library->has($name)
		);
	}

	public function testGetInstance()
	{
		$name = 'somemodifier';
		$class = 'stdClass';

		$this->library->add($name, $class);

		$this->assertInstanceOf($class, $this->library->getInstance($name));
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testGetInvalidInstance()
	{
		$this->library->getInstance('fake');
	}

}
