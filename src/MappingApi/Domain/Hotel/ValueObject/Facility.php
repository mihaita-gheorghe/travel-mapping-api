<?php

namespace MappingApi\Domain\Hotel\ValueObject;

final class Facility
{
	/**
	 * @var string
	 */
    private $code;
	/**
	 * @var string
	 */
    private $name;

	public function __construct(string $name, string $code)
	{
		$this->code = $code;
		$this->name = $name;
	}

    public function code(): string
    {
        return $this->name;
    }
	
	public function name(): string
    {
        return $this->name;
    }
}
