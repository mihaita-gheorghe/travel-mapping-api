<?php

namespace MappingApi\Infrastructure\IdentityBundle\Repository\Doctrine;

use MappingApi\Domain\Identity\Model\ApiEntity;
use \MappingApi\Domain\Identity\Repository\ApiEntityRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;


class ApiEntityRepository extends ServiceEntityRepository implements ApiEntityRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiEntity::class);
    }

	/**
	 * @param ApiEntity $entity
	 * @return void
	 */
	public function addApiEntity(ApiEntity $entity): void
	{
		$this->add($entity);
	}

	/**
	 * @param ApiEntity $entity
	 * @return void
	 */
	public function removeApiEntity(ApiEntity $entity): void
	{
		$this->remove($entity);
	}

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ApiEntity $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ApiEntity $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

	/**
	 * @param string $uuid
	 * @return ApiEntity|null
	 */
	public function findByUuid(string $uuid): ?ApiEntity
	{
		 return $this->createQueryBuilder('c')
            ->andWhere('c.uuid = :val')
            ->setParameter('val', $uuid)
            ->getQuery()
            ->getOneOrNullResult()
        ;
	}

	/**
	 * @param string $email
	 * @return ApiEntity[]
	 */
	public function findByEmail(string $email): array
	{
		 return $this->createQueryBuilder('c')
            ->andWhere('c.email = :val')
            ->setParameter('val', $email)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
	}
}
