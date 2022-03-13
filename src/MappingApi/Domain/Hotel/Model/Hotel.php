<?php

namespace MappingApi\Domain\Hotel\Model;

use MappingApi\Domain\Geography\ValueObject\Address;
use MappingApi\Domain\Hotel\Model\HotelInterface;
use MappingApi\Domain\Hotel\ValueObject\HotelType;
use MappingApi\Domain\Hotel\ValueObject\Room;
use MappingApi\Domain\Hotel\Exception\DuplicateRoomException;
use MappingApi\Domain\Hotel\Exception\RoomNotFoundException;

class Hotel implements HotelInterface
{
	/**
	 * @var string
	 */
    protected $name;

	/**
	 * @var HotelType
	 */
    protected $type;

	/**
	 * @var int
	 */
    protected $stars;

	/**
	 * @var Address 
	 */
	protected $address;

    /**
	 * @var Room[]
	 */
    protected $rooms;

	public function __construct(string $name, Address $address, HotelType $type, int $stars)
	{
		$this->name = $name;
		$this->address = $address;
		$this->type = $type;
		$this->stars = $stars;
		$this->rooms = [];
	}

    public function name(): string
    {
        return $this->name;
    }

    public function type(): HotelType
    {
        return $this->type;
    }

    public function stars(): int
    {
        return $this->stars;
    }
	
	public function address(): Address
    {
        return $this->address;
    }

    public function rooms(): ?array
    {
        return $this->rooms;
    }

	public function addRoom(Room $room): void
	{
		if (isset($this->rooms[$room->code()]))
			throw new DuplicateRoomException();
		$this->rooms[$room->code()] = $room;
	}

	public function hasRoom(string $roomCode): bool
	{
		return isset($this->rooms[$roomCode]);
	}

	public function removeRoom(string $roomCode): void
	{
		if (!isset($this->rooms[$roomCode]))
			throw new RoomNotFoundException();
		unset($this->rooms[$roomCode]);
	}
	
	public function getRoom(string $roomCode): ?Room
	{
		if (!isset($this->rooms[$roomCode]))
			throw new RoomNotFoundException();
		return $this->rooms[$roomCode];
	}
}
