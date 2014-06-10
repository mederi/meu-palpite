<?php

namespace MeuPalpite\Models;

class Times
{
	protected $database;

	public function __construct($database)
	{
		$this->database = $database;
	}

	public function getAll()
	{
		return $this->database->getMapper()->times->fetchAll();
	}

}