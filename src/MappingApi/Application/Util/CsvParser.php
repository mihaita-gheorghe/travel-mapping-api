<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MappingApi\Application\Util;

use Symfony\Component\Finder\Finder;

/**
 * Description of CsvParser
 */
class CsvParser 
{
	protected $finderIn;

	protected $finderName;

	protected $ignoreFirstLine = false;

	public function __construct(string $finderIn, string $finderName, bool $ignoreFirstLine = false) 
	{
		$this->finderIn = $finderIn;
		$this->finderName = $finderName;
		$this->ignoreFirstLine = $ignoreFirstLine;
	}

	public function getData(): array
	{
		$finder = new Finder();
        $finder->files()->in($this->finderIn)->name($this->finderName);

		$csv = null;
        foreach ($finder as $file) { 
			$csv = $file; 
			break;
		}

		if ($csv === null)
			throw new \Exception('File not found!');

        $rows = [];
        if (($handle = fopen($csv->getRealPath(), "r")) !== false) {
            $i = 0;
            while (($data = fgetcsv($handle, null, ",")) !== false) {
                $i++;
                if ($this->ignoreFirstLine && ($i == 1)) { 
					continue; 
				}
                $rows[] = $data;
            }
            fclose($handle);
        }

        return $rows;
	}
}