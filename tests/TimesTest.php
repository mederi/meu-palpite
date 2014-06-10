<?php

namespace Test;

use MeuPalpite\Models\Times;
use MyLib\Database;

class TimesTest extends \PHPUnit_Framework_TestCase
{
	protected $times;

	public function setUp()
	{		
		$this->times = new Times(new Database('sqlite:db/meupalpite.sq3'));
	}
	public function testTotalTimes()
	{
		$this->assertCount(32, $this->times->getAll());
	}

}