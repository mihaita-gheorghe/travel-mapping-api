<?php

namespace MappingApi\Domain\Geography\Repository;

use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Geography\Model\Location;
use MappingApi\Domain\Geography\ValueObject\MapEntry;

interface LocationRepositoryInterface
{
	public function findAllInRange(MapEntry $x1, MapEntry $x2, MapEntry $y1, MapEntry $y2): array;

	public function findByCountry(Country $country): array;

	public function findByState(State $state): array;

	public function addLocation(Location $location): void;

	public function removeLocation(Location $location): void;
}