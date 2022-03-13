<?php

namespace MappingApi\Domain\Api\Exception;

use MappingApi\Domain\Api\Exception\CustomException;

class DuplicateCredentialsSetException extends \LogicException 
{
	use CustomException;

	protected static $customCode = 1005;

	protected static $customMessage = 'duplicate_credentials.exception';

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
