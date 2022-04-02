<?php

namespace MappingApi\Infrastructure\MappingBundle\Repository\Doctrine;

use MappingApi\Domain\Hotel\Model\Hotel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use MappingApi\Domain\Hotel\Repository\HotelRepositoryInterface;
use MappingApi\Domain\Geography\Model\Country;
use MappingApi\Domain\Geography\Model\State;
use MappingApi\Domain\Geography\ValueObject\MapEntry;

class TravelSystemHotel extends ServiceEntityRepository implements HotelRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiEntity::class);
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
    public function add(TravelSystemHotel $hotel, bool $flush = true): void
    {
        $this->_em->persist($hotel);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TravelSystemHotel $hotel, bool $flush = true): void
    {
        $this->_em->remove($hotel);
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
	 * @return TravelSystemHotel[]
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
	 * @return TravelSystemHotel[]
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
