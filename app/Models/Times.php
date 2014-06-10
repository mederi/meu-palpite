<?php

namespace MeuPalpite\Models;

class Times
{
	protected $mapper;

	public function __construct($mapper)
	{
		$this->mapper = $mapper;
	}

	public function getAll()
	{
		return $this->mapper->times->fetchAll();
	}

}