<?php

namespace Test;

use MeuPalpite\Models\Jogos;

class JogosTest extends \PHPUnit_Framework_TestCase
{

	public function testListarJogos()
	{
		$j = new Jogos;
		$this->assertCount(48, $j->getAll());
	}

}