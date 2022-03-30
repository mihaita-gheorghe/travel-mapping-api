<?php

namespace MappingApiTests\Domain\Hotel;

use PHPUnit\Framework\TestCase;
use MappingApi\Domain\Geography\ValueObject\Address;
use MappingApi\Domain\Geography\ValueObject\MapEntry;
use MappingApi\Domain\Geography\Model\Location;
use MappingApi\Domain\Geography\ValueObject\LocationType;
use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Hotel\Model\Hotel;
use MappingApi\Domain\Hotel\ValueObject\Room;
use MappingApi\Domain\Hotel\ValueObject\HotelType;
use MappingApi\Domain\Hotel\ValueObject\Facility;
use MappingApi\Domain\Hotel\Exception\RoomNotFoundException;
use MappingApi\Domain\Hotel\Exception\DuplicateRoomException;
use MappingApi\Domain\Hotel\Exception\FacilityNotFoundException;
use MappingApi\Domain\Hotel\Exception\DuplicateFacilityException;

class HotelTest extends TestCase
{
	protected function setUp(): void
    {
		// do nothing for now
	}

	protected function tearDown(): void
	{
		// do nothing for now
	}

	/**
	 * @return Hotel
	 */
	public function testCreate() : Hotel
    {
		$country = new Country("United states of America", "US", "USD", ['North America']);
		$state = new State($country, "New York", "NY");
		$location = new Location($country, LocationType::City, "New York", "NY", new MapEntry(40.740078, -74.144483), $state);
		$addr = new Address($location, new MapEntry(40.671369, -74.175725), "Elizabeth Road", "1-95", "NJ 07201");
		$hotel = new Hotel("Elizabeth Hotel", $addr, HotelType::Hostel, 3);
		$this->assertInstanceOf('MappingApi\Domain\Hotel\Model\Hotel', $hotel);
		return $hotel;
    }
	/**
	 * @depends testCreate
	 */
	public function testRoomCreate(Hotel $hotel): Room
	{
		$dblRoom = new Room($hotel, "Double Room", "DBL");
		$this->assertInstanceOf('MappingApi\Domain\Hotel\ValueObject\Room', $dblRoom);
		return $dblRoom;
	}

	/**
	 * @depends testRoomCreate
	 */
	public function testFacilityAddOnRoom(Room $room): void
	{
		$this->expectExceptionMessage(DuplicateFacilityException::getCustomMessage());
		$hairdyerFacility = new Facility("Hair Dyer", "HD");
		$room->addFacility($hairdyerFacility);
		$room->addFacility($hairdyerFacility);
	}

	/**
	 * @depends testRoomCreate
	 */
	public function testFacilityRemoveFromRoom(Room $room): void
	{
		// just playing a bit
		$this->expectExceptionMessageMatches('/' . substr(FacilityNotFoundException::getCustomMessage(), 0, 10) . '/');
		$room->removeFacility('HDR');
	}

	/**
	 * @depends testRoomCreate
	 */
	public function testFacilityGetFromRoom(Room $room): void
	{
		$this->expectExceptionCode(FacilityNotFoundException::getCustomCode());
		$room->getFacility('HDR');
	}

	/**
	 * @depends testCreate
	 * @depends testRoomCreate
	 */
	public function testAddingRoomOnHotel(Hotel $hotel, Room $room): void
	{
		$this->expectExceptionCode(DuplicateRoomException::getCustomCode());
		$hotel->addRoom($room);
		$hotel->addRoom($room);
	}

	/**
	 * @depends testCreate
	 */
	public function testRemovingRoomFromHotel(Hotel $hotel): void
	{
		$this->expectExceptionCode(RoomNotFoundException::getCustomCode());
		$hotel->removeRoom('APART');
	}
}
