<?php
/**
 * @author Ve Kraken Development Team
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Responsible for constructing rule sets.
 *
 * @package Ve\LogicProcessor
 */
class RuleFactory
{

	/**
	 * @var EntityCollectionInterface
	 */
	protected $entityCollection;

	public function __construct(EntityCollectionInterface $entityCollection)
	{
		$this->entityCollection = $entityCollection;
	}

}
