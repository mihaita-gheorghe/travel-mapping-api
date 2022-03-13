<?php

namespace MappingApi\Domain\Geography\Model;

final class Country
{
	/**
	 * @var string
	 */
    private $name;

	/**
	 * @var string
	 */
    private $code;

	/**
	 * @var string
	 */
	private $currency;

	/** 
	 * @var array
	 */
    private $continents = [];

	public function __construct(string $name, string $code, string $currency, array $continents = [])
	{
		$this->name = $name;
		$this->code = $code;
		$this->currency = $currency;
		$this->continents = $continents;
	}

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }

	public function currency(): string
    {
        return $this->currency;
    }

    public function continents(): ?array
    {
        return $this->continents;
    }
}
