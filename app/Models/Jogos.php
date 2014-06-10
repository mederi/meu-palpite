<?php

namespace MeuPalpite\Models;

class Jogos
{
	protected $database;

	public function __construct($database)
	{
		$this->database = $database;
	}

	public function getAll()
	{
	/*return $this->database->getDb()
		->select('*')
		->from('jogos', 'times as times_casa', 'times as times_visitante')
		->where(array(
			'jogos.time_id_casa' => 'times_casa.id'
			))
		->fetchAll();		*/

		return $this->database->getMapper()->jogos->fetchAll();

	}
}