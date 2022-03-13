<?php

namespace MappingApi\Domain\Hotel\Repository;

use MappingApi\Domain\Hotel\Model\Hotel;
use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Geography\ValueObject\MapEntry;

interface HotelRepositoryInterface
{
	public function findByCode($code): ?Hotel;

	public function addHotel(Hotel $hotel): void;

	public function removeHotel(Hotel $hotel): void;

	public function findByCountry(Country $country): array;

	public function findByState(State $state): array;

	public function findAllInRange(MapEntry $x1, MapEntry $x2, MapEntry $y1, MapEntry $y2): array;
}
