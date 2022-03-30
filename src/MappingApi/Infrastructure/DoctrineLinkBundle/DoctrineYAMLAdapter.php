<?php


namespace MappingApi\Infrastructure\DoctrineLinkBundle;

/**
 * Description of DoctrineYAMLAdapter
 *
 */
class DoctrineYAMLAdapter 
{
	private static $instance = null;

	private $conn;

	private function __construct()
	{
		/*
		$namespaces = array(
			'MappingApi\Infrastructure\IdentityBundle\Resources\config\doctrine' => 'MappingApi\Domain\Identity\Model',
			'MappingApi\Infrastructure\GeographyBundle\Resources\config\doctrine' => 'MappingApi\Domain\Geography\Model',
		);

		$driver = new \Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver($namespaces);
		var_dump('$driver', $driver);
		$driver->setGlobalBasename('global');
		*/
	}

	public static function getInstance()
	{
		if (!self::$instance)
		{
			self::$instance = new DoctrineYAMLAdapter();
		}
		return self::$instance;
	}

	public function getConnection()
	{
		return $this->conn;
	}
}
