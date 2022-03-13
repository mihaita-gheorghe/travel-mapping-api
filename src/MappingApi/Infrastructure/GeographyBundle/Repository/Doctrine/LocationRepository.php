<?php

namespace MappingApi\Infrastructure\GeographyBundle\Repository\Doctrine;

use MappingApi\Domain\Geography\Model\Location;
use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Geography\ValueObject\MapEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use MappingApi\Domain\Geography\Repository\LocationRepositoryInterface;

class LocationRepository extends ServiceEntityRepository implements LocationRepositoryInterface
{
	public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Location::class);
    }

	/**
	 * @param Location $location
	 * @return void
	 */
	public function addLocation(Location $location): void
	{
		$this->add($location);
	}

	/**
	 * @param Location $location
	 * @return void
	 */
	public function removeLocation(Location $location): void
	{
		$this->remove($location);
	}

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Location $entity, bool $flush = true): void
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
    public function remove(Location $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

	public function findAllInRange(MapEntry $x1, MapEntry $x2, MapEntry $y1, MapEntry $y2): array
	{
		//@TODO
	}
	
	/**
	 * @param State $state
	 * @return Location[]
	 */
	public function findByState(State $state): array
	{
		 return $this->createQueryBuilder('c')
            ->andWhere('c.state_code = :val')
            ->setParameter('val', $state->code())
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
		;
	}

	/**
	 * @param Country $country
	 * @return Location[]
	 */
	public function findByCountry(Country $country): array
	{
		return $this->createQueryBuilder('c')
            ->andWhere('c.country_code = :val')
            ->setParameter('val', $country->code())
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
		;
	}
}
