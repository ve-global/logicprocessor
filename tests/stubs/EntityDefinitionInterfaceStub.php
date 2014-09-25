<?php

namespace Ve\LogicProcessor;

class EntityDefinitionInterfaceStub implements EntityDefinitionInterface
{

	protected $properties = [
		'name' => 'string',
		'id' => 'int',
	];

	/**
	 * Should return true if the entity contains the given property.
	 *
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasProperty($name)
	{
		return isset($this->properties[$name]);
	}

	/**
	 * Should return an array where the keys are the names of properties and the value is one or more types that apply
	 * to the property.
	 *
	 * ['foo' => TypeEnum::$STRING, 'bar' => [TypeEnum::$STRING, TypeEnum::$NUMBER]]
	 *
	 * @return array
	 */
	public function getProperties()
	{
		return $this->properties;
	}

}
