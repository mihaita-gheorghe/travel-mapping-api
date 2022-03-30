<?php

namespace MappingApi\Domain\Mapping\Exception;

use MappingApi\Domain\Identity\Exception\CustomException;

class InvalidArgumentTravelLocationException extends \InvalidArgumentException
{
	use CustomException;

	protected static $customCode = 1004;

	protected static $customMessage = 'travel_location.invalid_type';

	public function __construct()
    {
        parent::__construct(static::$customMessage, static::$customCode);
    }

	protected static function checkCustomCodeAndMessage()
	{
		if (empty(static::$customMessage) || empty(static::$customCode))
			throw new \Exception("custom message and custom code are mandatory.");
	}
}