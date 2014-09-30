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

class ModifierLibraryTest extends Test
{

	/**
	 * @var ModifierLibrary
	 */
	protected $library;

	protected function _before()
	{
		$this->library = new ModifierLibrary;
	}

	public function testGetInstance()
	{
		$modifier = $this->library->getInstance('equal');

		$this->assertInstanceOf(
			'Ve\LogicProcessor\Modifier\Equal',
			$modifier
		);
	}

	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage foobar is not a known modifier.
	 */
	public function testGetInvalidInstance()
	{
		$this->library->getInstance('foobar');
	}

	public function testGetCustomInstance()
	{
		$name = 'foobar';
		$class = 'stdClass';

		$this->library->add($name, $class);

		$modifier = $this->library->getInstance($name);

		$this->assertInstanceOf($class, $modifier);
	}

}
