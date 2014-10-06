<?php

namespace Ve\LogicProcessor;

class HasProdRule extends AbstractRule
{

	/**
	 * Evaluates the rule
	 *
	 * @param mixed $context
	 *
	 * @return bool
	 */
	public function run($context)
	{
		foreach ($context['products'] as $product)
		{
			$result = $this->getAssertion()->run($product['qty']);

			if ($result)
			{
				return true;
			}
		}

		return false;
	}
}
