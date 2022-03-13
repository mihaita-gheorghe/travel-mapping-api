<?php

namespace MappingApi\Domain\Api\ValueObject;

use MappingApi\Domain\Api\ValueObject\ApiEnvronment;

class CredentialsSet 
{
	/**
	 * @var string 
	 */
	private $label;
	/**
	 * @var ApiEnvronment
	 */
	private $apiEnvironment;
	/**
	 * @var string
	 */
	private $apiUrl;
	/**
	 * @var string 
	 */
	private $username;
	/**
	 * @var string
	 */
	private $apiKey;

	public function __construct(string $label, ApiEnvronment $apiEnvironment, string $apiUrl, string $username, string $apiKey)
	{
		$this->label = $label;
		$this->apiUrl = $apiUrl;
		$this->username = $username;
		$this->apiKey = $apiKey;
		$this->apiEnvironment = $apiEnvironment;
	}
	
	public function label(): string
	{
		return $this->label;
	}
	
	public function apiEnvironment(): ApiEnvronment
	{
		return $this->apiProductionUrl;
	}

	public function apiUrl(): string
	{
		return $this->apiUrl;
	}

	public function username(): string
	{
		return $this->username;
	}

	public function apiKey(): string
	{
		return $this->apiKey;
	}
}