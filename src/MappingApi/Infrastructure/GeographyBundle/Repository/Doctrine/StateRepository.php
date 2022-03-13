<?php

namespace MappingApi\Infrastructure\GeographyBundle\Repository\Doctrine;

use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Geography\Model\Country;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use MappingApi\Domain\Geography\Repository\StateRepositoryInterface;

class StateRepository extends ServiceEntityRepository implements StateRepositoryInterface
{
	public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, State::class);
    }

	/**
	 * @param State $state
	 * @return void
	 */
	public function addState(State $state): void
	{
		$this->add($state);
	}

	/**
	 * @param State $state
	 * @return void
	 */
	public function removeState(State $state): void
	{
		$this->remove($state);
	}

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(State $entity, bool $flush = true): void
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
    public function remove(State $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

	/**
	 * @param string $code
	 * @return ApiEntity|null
	 */
	public function findByCode(string $code): ?State
	{
		 return $this->createQueryBuilder('c')
            ->andWhere('c.code = :val')
            ->setParameter('val', $code)
            ->getQuery()
            ->getOneOrNullResult()
        ;
	}

	/**
	 * @param Country $country
	 * @return State[]
	 */
	public function findByCountry(Country $country): array
	{
		return $this->createQueryBuilder('c')
            ->andWhere('c.country_code = :val')
            ->setParameter('val', $country)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
		;
	}
}
