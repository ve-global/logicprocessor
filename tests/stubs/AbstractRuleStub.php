<?php


namespace Ve\LogicProcessor;


class AbstractRuleStub extends AbstractRule
{

	/**
	 * Returns true if the rule is valid
	 *
	 * @return boolean
	 */
	public function validate()
	{
		return true;
	}
}
