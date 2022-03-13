<?php

namespace MappingApi\Infrastructure\HotelBundle\Repository\Doctrine;

use MappingApi\Domain\Hotel\Model\Hotel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use MappingApi\Domain\Hotel\Repository\HotelRepositoryInterface;
use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Geography\ValueObject\MapEntry;

class HotelRepository extends ServiceEntityRepository implements HotelRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hotel::class);
    }

	/**
	 * @param Hotel $hotel
	 * @return void
	 */
	public function addHotel(Hotel $hotel): void
	{
		$this->add($hotel);
	}

	/**
	 * @param Hotel $hotel
	 * @return void
	 */
	public function removeHotel(Hotel $hotel): void
	{
		$this->remove($hotel);
	}

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Hotel $entity, bool $flush = true): void
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
    public function remove(Hotel $entity, bool $flush = true): void
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

	public function findByCode($code): ?Hotel
	{
		return $this->createQueryBuilder('c')
            ->andWhere('c.code = :val')
            ->setParameter('val', $code)
            ->getQuery()
            ->getOneOrNullResult()
        ;
	}
	
	/**
	 * @param State $state
	 * @return Hotel[]
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
	 * @return Hotel[]
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
