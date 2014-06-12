<?php

namespace MeuPalpite\Models;

use Respect\Relational\Sql;

class Jogos
{
	protected $database;

	public function __construct($database)
	{
		$this->database = $database;
	}

	public function getAll($times = array())
	{
		$jogos = $this
			->database
			->getMapper()
			->jogos
			->fetchAll(Sql::orderBy('data_jogo')->asc());			

		$dataAnterior = \DateTime::createFromFormat('Y-m-d', '2014-01-01');	

		array_map(function($jogo) use ($times, &$dataAnterior) {				
			if (! empty($times)) {			
				$jogo->time_casa = $times[$jogo->time_id_casa - 1];
				$jogo->time_visitante = $times[$jogo->time_id_visitante - 1];	
			}			

			$dataJogo = \DateTime::createFromFormat('Y-m-d H:i:s', $jogo->data_jogo);							
			$jogo->pula = $dataJogo->format('d/m/Y') != $dataAnterior->format('d/m/Y');			
			$dataAnterior = clone $dataJogo;

			$jogo->data = $dataJogo->format('d/m/Y');
			$jogo->hora = $dataJogo->format('H:i');
			return $jogo;
		}, $jogos);
			

		return $jogos;
	}
}