<?php

namespace MappingApi\Domain\Mapping\Model;

class UnmapTravelSystemHotel
{
	/**
	 * @var TravelSystemHotel
	 */
	protected $travelSystemHotel;

	/**
     * @var \DateTimeImmutable
     */
    protected $unmappedOn;

	public function __construct(TravelSystemHotel $travelSystemHotel)
	{
		$this->travelSystemHotel = $travelSystemHotel;
		$this->unmappedOn = new \DateTimeImmutable();
	}
}