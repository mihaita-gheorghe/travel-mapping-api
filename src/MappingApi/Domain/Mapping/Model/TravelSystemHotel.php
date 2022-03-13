<?php

namespace MappingApi\Domain\Mapping\Model;

use MappingApi\Domain\Hotel\Model\Hotel;
use MappingApi\Domain\Hotel\Model\HotelInterface;
use MappingApi\Domain\Hotel\ValueObject\HotelType;
use MappingApi\Domain\Mapping\Model\TravelSystem;
use MappingApi\Domain\Mapping\Model\TravelSystemLocation;
use MappingApi\Domain\Mapping\Exception\InvalidArgumentTravelLocationException;
use MappingApi\Domain\Geography\ValueObject\Address;

final class TravelSystemHotel extends Hotel implements HotelInterface
{
	/**
	 * @var TravelSystem
	 */
	protected $travelSystem;
	/**
	 * @var string
	 */
	protected $travelSystemIdentifier;
	/**
	 * @var HotelInterface 
	 */
	protected $linkToHotel;

	public function __construct(string $name, Address $address, HotelType $type, int $stars) 
	{
		if (!($address->location() instanceof TravelSystemLocation))
			throw new InvalidArgumentTravelLocationException();
		parent::__construct($name, $address, $type, $stars);
	}

	public function travelSystem(): ?TravelSystem
	{
		return $this->travelSystem;
	}
	
	public function travelSystemIdentifier(): ?string
	{
		return $this->travelSystemIdentifier;
	}

	public function linkToHotel(): ?HotelInterface
	{
		return $this->travelSystemIdentifier;
	}

	public function setTravelSystem(TravelSystem $travelSystem): void
	{
		$this->travelSystem = $travelSystem;  
	}

	public function setTravelSystemIdentifier(string $travelSystemIdentifier): void
	{
		$this->travelSystemIdentifier = $travelSystemIdentifier;  
	}

	public static function setLinkToHotel(HotelInterface $hotel): void
	{
		$this->linkToHotel = $hotel;
	}
}