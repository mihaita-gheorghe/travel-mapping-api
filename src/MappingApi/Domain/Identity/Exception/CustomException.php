<?php

namespace MappingApi\Domain\Identity\Exception;

trait CustomException 
{
	/**
	 * make sure that every class that uses this trait will have $customCode and $customMessage
	 */
	abstract protected static function checkCustomCodeAndMessage();

	public static function getCustomCode()
	{
		return static::$customCode;
	}

	public static function getCustomMessage()
	{
		return static::$customMessage;
	}
}