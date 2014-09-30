<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Keeps track of mutators and allows them to be constructed.
 *
 * @package Ve\LogicProcessor
 */
class MutatorLibrary extends AbstractLibrary
{

	protected $notFoundError = ' is not a known mutator.';

}
