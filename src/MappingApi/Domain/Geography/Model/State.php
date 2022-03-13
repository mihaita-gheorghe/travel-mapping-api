<?php

namespace MappingApi\Domain\Geography\Model;

final class State
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
	 * @var Country
	 */
	private $country;

	public function __construct(Country $country, string $name, string $code)
	{
		$this->country = $country;
		$this->code = $code;
		$this->name = $name;
	}

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }

	public function country(): Country
    {
        return $this->country;
    }
}
