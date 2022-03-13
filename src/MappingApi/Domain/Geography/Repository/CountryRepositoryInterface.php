<?php

namespace MappingApi\Domain\Geography\Repository;

use MappingApi\Domain\Geography\Model\Country;

interface CountryRepositoryInterface
{
	public function findByCode(string $code): ?Country;

	public function addCountry(Country $country): void;

	public function removeCountry(Country $country): void;
}