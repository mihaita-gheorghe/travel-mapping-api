<?php

namespace MappingApi\Domain\Hotel\ValueObject;
use MappingApi\Domain\Hotel\model\HotelInterface;
use MappingApi\Domain\Hotel\Exception\DuplicateFacilityException;
use MappingApi\Domain\Hotel\Exception\FacilityNotFoundException;

final class Room
{
	/**
	 * @var string
	 */
    private $name;

	/**
	 * @var string
	 */
    private $code;

	/**
	 * @var Hotel
	 */
	private $hotel;

	/**
	 * @var Facility[]
	 */
    private $facilities;

	public function __construct(HotelInterface $hotel, string $name, string $code)
	{
		$this->hotel = $hotel;
		$this->name = $name;
		$this->code = $code;
		$this->facilities = [];
		$hotel->addRoom($this);
	}

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }
	
    public function hotel(): Hotel
    {
        return $this->hotel;
    }
	
	public function facilities(): array
	{
		return $this->facilities;
	}

	public function addFacility(Facility $facility): void
	{
		if (isset($this->facilities[$facility->code()]))
			throw new DuplicateFacilityException();
		$this->facilities[$facility->code()] = $facility;
	}

	public function hasFacility(string $facilityCode): bool
	{
		return isset($this->facilities[$facilityCode]);
	}

	public function removeFacility(string $facilityCode): void
	{
		if (!isset($this->facilities[$facilityCode]))
			throw new FacilityNotFoundException();
		unset($this->facilities[$facilityCode]);
	}

	public function getFacility(string $facilityCode): ?Facility
	{
		if (!isset($this->facilities[$facilityCode]))
			throw new FacilityNotFoundException();
	}
}