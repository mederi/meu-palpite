<?php

namespace MeuPalpite\Models;

class Jogos
{
	protected $mapper;

	public function __construct($mapper)
	{
		$this->mapper = $mapper;
	}

	public function getAll()
	{
		return $this->mapper->jogos->fetchAll();
	}
}