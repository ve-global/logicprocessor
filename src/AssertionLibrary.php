<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

/**
 * Keeps track of modifiers that can be applied to properties.
 *
 * @package Ve\LogicProcessor
 */
class AssertionLibrary extends AbstractFindingLibrary
{

	protected $baseNamespace = 'Ve\LogicProcessor\Assertion\\';

	protected $notFoundError = ' is not a known assertion.';

}
