<?php

namespace MappingApi\Domain\Hotel\Exception;

use MappingApi\Domain\Identity\Exception\CustomException;

class HotelNotFoundException extends \LogicException
{
	use CustomException;

	protected static $customCode = 1006;

	protected static $customMessage = 'hotel_not_found.exception';

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