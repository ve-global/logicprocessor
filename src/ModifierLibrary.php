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
class ModifierLibrary extends AbstractFindingLibrary
{

	protected $baseNamespace = 'Ve\LogicProcessor\Modifier\\';

	protected $notFoundError = ' is not a known modifier.';

}
