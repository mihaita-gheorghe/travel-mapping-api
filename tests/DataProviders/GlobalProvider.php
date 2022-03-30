<?php

namespace MappingApiTests\DataProviders;

use MappingApi\Domain\Geography\Model\Country;

class GlobalProvider
{
	public function getCountry(): Country
	{
		return new Country("United states of America", "US", "USD", ['North America']);
	}
}