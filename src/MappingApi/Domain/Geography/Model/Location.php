<?php

namespace MappingApi\Domain\Geography\Model;

use MappingApi\Domain\Geography\Model\LocationInterface;
use MappingApi\Domain\Geography\ValueObject\MapEntry;
use MappingApi\Domain\Geography\ValueObject\LocationType;

class Location implements LocationInterface
{	
	/**
	 * @var string
	 */
    protected $name;

	/**
	 * @var LocationType 
	 */
	protected $type;

	/**
	 * @var MapEntry
	 */
    protected $mapEntry;

	/**
	 * @var LocationInterface
	 */
	protected $parentLocation;

	/**
	 * @var State
	 */
	protected $state;

	/**
	 * @var Country
	 */
    protected $country;

	public function __construct(Country $country, LocationType $type, string $name, string $code, MapEntry $mapEntry, State $state = null, LocationInterface $parentLocation = null)
	{
		$this->country = $country;
		$this->type = $type;
		$this->name = $name;
		$this->code = $code;
		$this->mapEntry = $mapEntry;
		$this->state = $state;
		$this->parentLocation = $parentLocation;
	}

    public function name(): string
    {
        return $this->name;
    }

	public function type(): LocationType
    {
        return $this->type;
    }

	public function state(): ?State
    {
        return $this->state;
    }

    public function country(): Country
    {
        return $this->country;
    }

	public function parentLocation(): ?LocationInterface
    {
        return $this->parentLocation;
    }

	public function mapEntry(): MapEntry
    {
        return $this->mapEntry;
    }
}
