<?php

namespace MappingApi\Test\Domain\Api;

use PHPUnit\Framework\TestCase;
use MappingApi\Domain\Api\Model\ApiEntity;
use MappingApi\Domain\Api\ValueObject\ApiEnvronment;
use MappingApi\Domain\Api\ValueObject\CredentialsSet;
use MappingApi\Domain\Api\Exception\DuplicateCredentialsSetException;
use MappingApi\Domain\Api\Exception\CredentialsNotFoundException;
use MappingApi\Domain\Api\Exception\InvalidEmailException;

class ApiEntityTest extends TestCase
{
	public function testCreate() : ApiEntity
    {
		$apiEntity = new ApiEntity(uniqid(), "test_email87@gmail.com", "Company one");
		$this->assertInstanceOf('MappingApi\Domain\Api\Model\ApiEntity', $apiEntity);
		return $apiEntity;
    }

	public function testInvalidEmail(): AppEntity
	{
		$this->expectExceptionCode(InvalidEmailException::getCustomCode());
		$apiEntityS = new ApiEntity(uniqid(), "email87@gmail", "Company one");
		return $apiEntityS;
	}

	public function testCredentialsSetCreate(): CredentialsSet
	{
		$credentialsSet = new CredentialsSet('dev_server', ApiEnvronment::Development, 'https://test-api.com/rest/3.2/', 
			'dev_01', 'irvrgwcr4uasa_oimnu');
		$this->assertInstanceOf('MappingApi\Domain\Api\ValueObject\CredentialsSet', $credentialsSet);
		return $credentialsSet;
	}

	/**
     * @depends testCreate
	 * @depends testCredentialsSetCreate
     */
	public function testCredentialsSetsAdd(ApiEntity $entity, CredentialsSet $credentialsSet)
	{
		$this->expectExceptionCode(DuplicateCredentialsSetException::getCustomCode());
		$entity->addCredentialsSet($credentialsSet);
		$entity->addCredentialsSet($credentialsSet);
	}

	/**
     * @depends testCreate
     */
	public function testCredentialsSetsRemove(ApiEntity $entity)
	{
		$this->expectExceptionCode(CredentialsNotFoundException::getCustomCode());
		$entity->removeCredentialsSet('live_server');
	}

	/**
     * @depends testCreate
     */
	public function testCredentialsSetsGet(ApiEntity $entity)
	{
		$this->expectExceptionCode(CredentialsNotFoundException::getCustomCode());
		$entity->getCredentialsSet('live_server');
	}
	
}
