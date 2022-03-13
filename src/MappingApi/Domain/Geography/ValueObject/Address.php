<?php

namespace MappingApi\Domain\Geography\ValueObject;

use MappingApi\Domain\Geography\Model\LocationInterface;

final class Address
{
    /**
	 * @var LocationInterface
	 */
    private $location;

	/**
	 * @var string
	 */
	private $street;

	/**
	 * @var string
	 */
	private $streetNumber;

	/**
	 * @var string
	 */
	private $building;

	/**
	 * @var MapEntry 
	 */
	private $mapEntry;

	/**
	 * @var string
	 */
	private $zipCode;
	/**
	 * @var string
	 */
	private $details;

	public function __construct(LocationInterface $location, MapEntry $entry, string $street = null, string $streetNumber = null, 
		string $zipCode = null, string $building = null, string $details = null)
	{
		$this->location = $location;
		$this->entry = $entry;
		$this->street = $street;
		$this->streetNumber = $streetNumber;
		$this->zipCode = $zipCode;
		$this->building = $building;
		$this->details = $details;
	}

    public function location(): LocationInterface
    {
        return $this->location;
    }

	public function mapEntry(): MapEntry
    {
        return $this->mapEntry;
    }

	public function street(): ?string
    {
        return $this->street;
    }
	
	public function streetBumber(): ?string
    {
        return $this->streetNumber;
    }
	
	public function building(): ?string
    {
        return $this->building;
    }

	public function zipCode(): ?string
    {
        return $this->zipCode;
    }
	
	public function details(): ?string
    {
        return $this->details;
    }
}
