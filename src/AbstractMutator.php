<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Common logic for classes that mutate entities in various ways.
 *
 * @package Ve\LogicProcessor
 */
abstract class AbstractMutator
{

	public abstract function mutate($target);

}
