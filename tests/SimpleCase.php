<?php
/**
 * @Creator Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Author: Alexey Kutuzov <lexus27.khv@gmai.com>
 * @Project: ceive.text-plural
 */

namespace Ceive\Text\Plural\Tests;

use Ceive\Text\Plural;
use Ceive\Text\PluralTemplate;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class SimpleCase
 * @package Ceive\Text\Plural\Tests
 */
class SimpleCase extends \PHPUnit_Framework_TestCase{
	
	/**
	 *
	 */
	public function testPlural(){
		
		$p = new Plural('арбуз', 'арбуза' , 'арбузов');
		$this->assertEquals('0 арбузов', $p->render(0));
		$this->assertEquals('1 арбуз', $p->render(1));
		$this->assertEquals('2 арбуза', $p->render(2));
		$this->assertEquals('3 арбуза', $p->render(3));
		$this->assertEquals('4 арбуза', $p->render(4));
		$this->assertEquals('5 арбузов', $p->render(5));
		$this->assertEquals('6 арбузов', $p->render(6));
		$this->assertEquals('7 арбузов', $p->render(7));
		$this->assertEquals('8 арбузов', $p->render(8));
		$this->assertEquals('9 арбузов', $p->render(9));
		$this->assertEquals('10 арбузов', $p->render(10));
		$this->assertEquals('12 арбузов', $p->render(12));
		$this->assertEquals('15 арбузов', $p->render(15));
		$this->assertEquals('20 арбузов', $p->render(20));
		$this->assertEquals('21 арбуз', $p->render(21));
		$this->assertEquals('23 арбуза', $p->render(23));
		$this->assertEquals('25 арбузов', $p->render(25));
		
		
		$this->assertEquals('100 арбузов', $p->render(100));
		$this->assertEquals('101 арбуз', $p->render(101));
		$this->assertEquals('102 арбуза', $p->render(102));
		$this->assertEquals('105 арбузов', $p->render(105));
		
		$this->assertEquals('110 арбузов', $p->render(110));
		$this->assertEquals('111 арбузов', $p->render(111));
		$this->assertEquals('112 арбузов', $p->render(112));
		$this->assertEquals('115 арбузов', $p->render(115));
		
	}
	
	
	/**
	 *
	 */
	public function testTemplate(){
		
		$p = new PluralTemplate(
			'был загружен * файл',
			'были загружены * файла' ,
			'было загружено * файлов',
			'ни одного файла не было загружено'
		);
		$this->assertEquals('ни одного файла не было загружено', $p->render(0));
		$this->assertEquals('был загружен 1 файл', $p->render(1));
		$this->assertEquals('были загружены 2 файла', $p->render(2));
		$this->assertEquals('были загружены 3 файла', $p->render(3));
		$this->assertEquals('были загружены 4 файла', $p->render(4));
		$this->assertEquals('было загружено 5 файлов', $p->render(5));
		$this->assertEquals('было загружено 9 файлов', $p->render(9));
		$this->assertEquals('было загружено 10 файлов', $p->render(10));
		$this->assertEquals('было загружено 11 файлов', $p->render(11));
		$this->assertEquals('было загружено 12 файлов', $p->render(12));
		$this->assertEquals('было загружено 17 файлов', $p->render(17));
		$this->assertEquals('было загружено 20 файлов', $p->render(20));
		$this->assertEquals('был загружен 21 файл', $p->render(21));
		$this->assertEquals('были загружены 22 файла', $p->render(22));
		$this->assertEquals('были загружены 23 файла', $p->render(23));
		$this->assertEquals('были загружены 24 файла', $p->render(24));
		$this->assertEquals('было загружено 25 файлов', $p->render(25));
		
		
		
		
	}
	
	public function testTemplateImplodeFromArray(){
		
		$p = new PluralTemplate(
			['был загружен','*', 'файл'],
			['были загружены','*', 'файла'],
			['было загружено','*', 'файлов'],
			'ни одного файла не было загружено'
		);
		$this->assertEquals('ни одного файла не было загружено', $p->render(0));
		$this->assertEquals('был загружен 1 файл', $p->render(1));
		$this->assertEquals('были загружены 2 файла', $p->render(2));
		$this->assertEquals('были загружены 3 файла', $p->render(3));
		$this->assertEquals('были загружены 4 файла', $p->render(4));
		$this->assertEquals('было загружено 5 файлов', $p->render(5));
		$this->assertEquals('было загружено 9 файлов', $p->render(9));
		$this->assertEquals('было загружено 10 файлов', $p->render(10));
		$this->assertEquals('было загружено 11 файлов', $p->render(11));
		$this->assertEquals('было загружено 12 файлов', $p->render(12));
		$this->assertEquals('было загружено 17 файлов', $p->render(17));
		$this->assertEquals('было загружено 20 файлов', $p->render(20));
		$this->assertEquals('был загружен 21 файл', $p->render(21));
		$this->assertEquals('были загружены 22 файла', $p->render(22));
		$this->assertEquals('были загружены 23 файла', $p->render(23));
		$this->assertEquals('были загружены 24 файла', $p->render(24));
		$this->assertEquals('было загружено 25 файлов', $p->render(25));
		
	}
	
}


