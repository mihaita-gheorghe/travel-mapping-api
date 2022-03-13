<?php

namespace MappingApi\Domain\Mapping\Model;

use MappingApi\Domain\Hotel\model\HotelInterface;

class MapTravelSystemHotel
{
	/**
	 * @var TravelSystemHotel
	 */
	protected $travelSystemHotel;

	/**
	 * @var HotelInterface
	 */
	protected $hotel;

	/**
     * @var \DateTimeImmutable
     */
    protected $mappedOn;

	public function __construct(TravelSystemHotel $travelSystemHotel, HotelInterface $hotel)
	{
		$this->travelSystemHotel = $travelSystemHotel;
		$this->hotel = $hotel;
		$this->mappedOn = new \DateTimeImmutable();
	}

}