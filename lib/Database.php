<?php

namespace MyLib;

use Respect\Relational\Mapper;
use Respect\Relational\Db;

class Database
{

	protected $mapper;
	protected $db;

	public function __construct($dsn)
	{
		$this->mapper = new Mapper(new \PDO($dsn));
		$this->db = new Db(new \PDO($dsn));
	}

	public function getMapper()
	{		
		return $this->mapper;
	}

	public function getDb()
	{	return $this->db;
	}

}