<?php

namespace MappingApi\Domain\Identity\Repository;

use MappingApi\Domain\Identity\Model\ApiEntity;

interface ApiEntityRepositoryInterface
{
	public function findByUuid(string $uuid): ?ApiEntity;
	
	public function findByEmail(string $email): array;

	public function addApiEntity(ApiEntity $entity): void;

	public function removeApiEntity(ApiEntity $entity): void;
}