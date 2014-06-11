<?php

namespace MeuPalpite\Models;

class Jogos
{
	protected $database;

	public function __construct($database)
	{
		$this->database = $database;
	}

	public function getAll($times = array())
	{
		$jogos = $this->database->getMapper()->jogos->fetchAll();		
		if (! empty($times))
			array_map(function($jogo) use ($times) {				
				$jogo->time_casa = $times[$jogo->time_id_casa - 1];
				$jogo->time_visitante = $times[$jogo->time_id_visitante - 1];
				return $jogo;
			}, $jogos);

		return $jogos;
	}
}