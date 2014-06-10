<?php

namespace Test;

use MeuPalpite\Models\Times;
use Respect\Relational\Mapper;

class TimesTest extends \PHPUnit_Framework_TestCase
{
	protected $times;

	public function setUp()
	{
		$mapper = new Mapper(new \PDO('sqlite:db/meupalpite.sq3'));
		$this->times = new Times($mapper);
	}
	public function testTotalTimes()
	{
		$this->assertCount(32, $this->times->getAll());
	}

}