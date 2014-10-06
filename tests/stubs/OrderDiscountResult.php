<?php

namespace Ve\LogicProcessor;

class OrderDiscountResult extends AbstractResult
{

	public function mutate(&$target)
	{
		$target->total = $this->getValue();
	}

}
