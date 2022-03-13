<?php

namespace MappingApi\Infrastructure\GeographyBundle\Repository\Doctrine;

use MappingApi\Domain\Geography\Model\Country;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use MappingApi\Domain\Geography\Repository\CountryRepositoryInterface;

class CountryRepository extends ServiceEntityRepository implements CountryRepositoryInterface
{
	public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Country::class);
    }

	/**
	 * @param Country $country
	 * @return void
	 */
	public function addCountry(Country $country): void
	{
		$this->add($country);
	}

	/**
	 * @param Country $country
	 * @return void
	 */
	public function removeCountry(Country $country): void
	{
		$this->remove($country);
	}

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Country $entity, bool $flush = true): void
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
    public function remove(Country $entity, bool $flush = true): void
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
	public function findByCode(string $code): ?Country
	{
		 return $this->createQueryBuilder('c')
            ->andWhere('c.code = :val')
            ->setParameter('val', $code)
            ->getQuery()
            ->getOneOrNullResult()
        ;
	}
}
