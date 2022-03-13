<?php

namespace MappingApi\Domain\Hotel\ValueObject;

enum HotelType: string {

	case Hotel = 'hotel';
	case Hostel = 'hostel';
	case Villa = 'villa';
	case Apartment = 'apartment';
}
