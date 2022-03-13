<?php

namespace MappingApi\Domain\Geography\Repository;

use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;

interface StateRepositoryInterface
{
	public function findByCode(string $code): ?State;

	public function findByCountry(Country $country): array;

	public function addState(State $state): void;

	public function removeState(State $state): void;
}