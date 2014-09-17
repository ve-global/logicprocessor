<?php

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;

class TempTest extends Test
{

	public function testReturnTrue()
	{
		$instance = new Temp;
		$this->assertTrue($instance->returnTrue());
	}

}
