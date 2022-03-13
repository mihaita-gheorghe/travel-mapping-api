<?php

namespace MappingApi\Domain\Mapping\Model;

class UnmapTravelSystemLocation
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
    protected $unmappedOn;

	public function __construct(TravelSystemLocation $travelSystemLocation) 
	{
		$this->travelSystemLocation = $travelSystemLocation;
		$this->unmappedOn = new \DateTimeImmutable();
	}
}