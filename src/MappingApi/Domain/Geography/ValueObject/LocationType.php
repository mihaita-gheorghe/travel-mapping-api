<?php

namespace MappingApi\Domain\Geography\ValueObject;

enum LocationType: string {

	case Village = 'village';
	case Area = 'area';
	case City = 'city';
}
