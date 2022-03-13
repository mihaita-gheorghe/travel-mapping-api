<?php

namespace MappingApi\Domain\Geography\ValueObject;

final class MapEntry 
{
	/**
	 * @var float
	 */
    private $latitude;

	/**
	 * @var float
	 */
    private $longitude;

	public function __construct(float $latitude, float $longitude)
	{
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}

	public function latitude()
	{
		return $this->latitude;
	}
	
	public function longitude()
	{
		return $this->longitude;
	}
}
