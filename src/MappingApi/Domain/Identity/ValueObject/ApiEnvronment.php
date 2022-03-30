<?php

namespace MappingApi\Domain\Identity\ValueObject;

enum ApiEnvronment: string 
{
	case Development = 'dev';

	case Sandbox = 'sandbox';

	case Production = 'production';
}
