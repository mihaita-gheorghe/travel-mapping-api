<?php

namespace MappingApiTests\Domain\Mapping;

use PHPUnit\Framework\TestCase;

use MappingApi\Domain\Geography\ValueObject\Address;
use MappingApi\Domain\Geography\ValueObject\MapEntry;
use MappingApi\Domain\Geography\Model\Location;
use MappingApi\Domain\Geography\ValueObject\LocationType;
use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Hotel\Model\Hotel;
use MappingApi\Domain\Hotel\ValueObject\HotelType;
use MappingApi\Domain\Mapping\Model\TravelSystemHotel;
use MappingApi\Domain\Mapping\Exception\InvalidArgumentTravelLocationException;

class TravelSystemHotelTest extends TestCase
{	
	public function testCreate() : Hotel
    {
		$country = new Country("United states of America", "US", "USD", ['North America']);
		$state = new State($country, "New York", "NY");
		$location = new Location($country, LocationType::City, "New York", "NY", new MapEntry(40.740078, -74.144483), $state);
		$addr = new Address($location, new MapEntry(40.671369, -74.175725), "Elizabeth Road", "1-95", "NJ 07201");

		$this->expectExceptionMessage(InvalidArgumentTravelLocationException::getCustomMessage());
		$hotel = new TravelSystemHotel("Elizabeth Hotel", $addr, HotelType::Hostel, 3);
		return $hotel;
    }
}
