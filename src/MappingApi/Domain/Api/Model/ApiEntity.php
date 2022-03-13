<?php

namespace MappingApi\Domain\Api\Model;

use MappingApi\Domain\Api\ValueObject\CredentialsSet;
use MappingApi\Domain\Api\Exception\DuplicateCredentialsSetException;
use MappingApi\Domain\Api\Exception\CredentialsNotFoundException;
use MappingApi\Domain\Api\Exception\InvalidEmailException;

class ApiEntity
{
	/**
	 * @var string
	 */
	protected $uuid;

	/**
	 * @var string
	 */
	protected $email;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var boolean
	 */
	protected $active;

	/**
	 * @var CredentialsSet[]
	 */
	private $credentialsSets;

	public function __construct(string $uuid, string $email, string $name)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			throw new InvalidEmailException();

		$this->uuid = $uuid;
		$this->email = $email;
		$this->name = $name;
		$this->credentialsSets = [];
	}

	public function uuid(): string
	{
		return $this->email;
	}

	public function email(): string
	{
		return $this->email;
	}

	public function name(): string
	{
		return $this->name;
	}

	public function active(): bool
	{
		return $this->active;
	}

	public function activateAccount(): void
	{
		$this->active = true;
	}

	public function deactivateAccount(): void
	{
		$this->active = true;
	}

	public function addCredentialsSet(CredentialsSet $credentialsSet): void
	{
		if (isset($this->credentialsSets[$credentialsSet->label()]))
			throw new DuplicateCredentialsSetException();
		$this->credentialsSets[$credentialsSet->label()] = $credentialsSet;
	}

	public function removeCredentialsSet(string $label): void
	{
		if (!isset($this->credentialsSets[$label]))
			throw new CredentialsNotFoundException();
		unset($this->credentialsSets[$label]);
	}

	public function getCredentialsSet($label): CredentialsSet
	{
		if (!isset($this->credentialsSets[$label]))
			throw new CredentialsNotFoundException();
		return $this->credentialsSets[$label];
	}
}
