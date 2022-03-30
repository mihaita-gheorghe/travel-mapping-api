<?php

namespace MappingApi\Domain\Identity\Exception;

use MappingApi\Domain\Identity\Exception\CustomException;

class InvalidEmailException extends \InvalidArgumentException 
{
	use CustomException;

	protected static $customCode = 1011;

	protected static $customMessage = 'invalid_email_address.exception';

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
