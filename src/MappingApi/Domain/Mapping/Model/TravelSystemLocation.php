<?php

namespace MappingApi\Domain\Mapping\Model;

use MappingApi\Domain\Geography\Model\Model\LocationInterface;
use MappingApi\Domain\Geography\Model\Location;

final class TravelSystemLocation extends Location implements LocationInterface
{
	/**
	 * @var TravelSystem
	 */
	protected $travelSystem;
	/**
	 * @var string
	 */
	protected $travelSystemIdentifier;
	/**
	 * @var LocationInterface 
	 */
	protected $linkToLocation;
	
	public function travelSystem(): ?TravelSystem
	{
		return $this->travelSystem;
	}
	
	public function travelSystemIdentifier(): ?string
	{
		return $this->travelSystemIdentifier;
	}

	public function linkToLocation(): ?LocationInterface
	{
		return $this->linkToLocation;
	}

	public function setTravelSystem(TravelSystem $travelSystem): void
	{
		$this->travelSystem = $travelSystem;  
	}

	public function setTravelSystemIdentifier(string $travelSystemIdentifier): void
	{
		$this->travelSystemIdentifier = $travelSystemIdentifier;  
	}

	public static function setLinkToLocation(LocationInterface $location): void
	{
		$this->linkToLocation = $location;
	}
}