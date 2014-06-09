<?php

namespace Test;

use MeuPalpite\Models\Times;

class TimesTest extends \PHPUnit_Framework_TestCase
{

	public function testTotalTimes()
	{
		$t = new Times;
		$this->assertCount(32, $t->getAll());
	}

}