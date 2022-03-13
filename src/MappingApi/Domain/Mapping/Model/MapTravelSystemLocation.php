<?php

namespace MappingApi\Domain\Mapping\Model;

use MappingApi\Domain\Geography\Model\LocationInterface;

class MapTravelSystemLocation
{
	/**
	 * @var TravelSystemLocation
	 */
	protected $travelSystemLocation;

	/**
	 * @var LocationHotelInterface
	 */
	protected $location;

	/**
     * @var \DateTimeImmutable
     */
    protected $mappedOn;

	public function __construct(TravelSystemLocation $travelSystemLocation, LocationInterface $location) 
	{
		$this->travelSystemLocation = $travelSystemLocation;
		$this->location = $location;
		$this->mappedOn = new \DateTimeImmutable();
	}
}