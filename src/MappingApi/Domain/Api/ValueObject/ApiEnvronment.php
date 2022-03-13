<?php

namespace MappingApi\Domain\Api\ValueObject;

enum ApiEnvronment: string 
{
	case Development = 'dev';

	case Sandbox = 'sandbox';

	case Production = 'production';
}
