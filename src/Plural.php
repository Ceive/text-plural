<?php
/**
 * @Creator Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Author: Alexey Kutuzov <lexus27.khv@gmai.com>
 * @Project: ceive.text-plural
 */

namespace Ceive\Text;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class Plural
 * @package Ceive\Text
 *
 * 0 дней           0 раз           0 конфет            0 собраний      - zero(many)
 * 1 день           1 раз           1 конфета           1 собрание      - one
 * 2 дня            2 раза          2 конфеты           2 собрания      - several
 * 3 дня            3 раза          3 конфеты           3 собрания      - several
 * 4 дня            4 раза          4 конфеты           4 собрания      - several
 * 5 дней           5 раз           5 конфет            5 собраний      - many
 * 6 дней           6 раз           6 конфет            6 собраний      - many
 * 7 дней           7 раз           7 конфет            7 собраний      - many
 * 8 дней           8 раз           8 конфет            8 собраний      - many
 * 9 дней           9 раз           9 конфет            9 собраний      - many
 * 10 дней          10 раз          10 конфет           10 собраний     - many
 * 11 дней          11 раз          11 конфет           11 собраний     - many
 * 12 дней          12 раз          12 конфет           12 собраний     - many
 * 13 дней          13 раз          13 конфет           13 собраний     - many
 * 14 дней          14 раз          14 конфет           14 собраний     - many
 * 15 дней          15 раз          15 конфет           15 собраний     - many
 * 16 дней          16 раз          16 конфет           16 собраний     - many
 * 17 дней          17 раз          17 конфет           17 собраний     - many
 * 18 дней          18 раз          18 конфет           18 собраний     - many
 * 19 дней          19 раз          19 конфет           19 собраний     - many
 * 20 дней          20 раз          20 конфет           20 собраний     - many
 * 21 день          21 раз          21 конфета          21 собрание     - one
 * 22 дня           22 раза         22 конфеты          22 собрания     - several
 * 23 дня           23 раза         23 конфеты          23 собрания     - several
 * 24 дня           24 раза         24 конфеты          24 собрания     - several
 * 25 дней          25 раз          25 конфет           25 собраний     - many
 *
 *
 * @todo template
 * -one 'добавлен * файл'
 * -many 'добавленно * файлов'
 * -several 'добавленны * файла'
 * -zero 'не было добавленно ниодного файла'
 *
 *
 */
class Plural implements PluralInterface{
	
	public $single;
	
	public $several;
	
	public $many;
	
	public $zero;
	
	/**
	 * Plural constructor.
	 * @param $single
	 * @param $several
	 * @param $many
	 * @param $zero
	 */
	public function __construct($single, $several, $many, $zero){
		
		$this->single = $single;
		$this->several = $several;
		$this->many = $many;
		$this->zero = $zero;
	}
	
	/**
	 * @param $number
	 * @return mixed
	 */
	public function render($number){
		list($a,$b) = $this->_split($number);
		if($b == 1){
			return $this->wrapSingle($number);
		}else if($b > 1 && $b < 5){
			if($a === 1){
				return $this->wrapMany($number);
			}
			return $this->wrapSeveral($number);
		}else if($b == 0){
			return $this->wrapZero($number);
		}else{
			return $this->wrapMany($number);
		}
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapZero($number){
		return $number . ' ' . ($this->zero?:$this->many);
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapSingle($number){
		return $number . ' ' . ($this->single);
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapSeveral($number){
		return $number . ' ' . ($this->several);
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapMany($number){
		return $number . ' ' . ($this->many);
	}
	
	public function pluralZero(){
		return $this->_queueN(['zero','many','many']);
	}
	public function pluralSingle(){
		return $this->_queueN(['single','many','many']);
	}
	public function pluralSeveral(){
		return $this->_queueN(['several','many']);
	}
	public function pluralMany(){
		return $this->_queueN(['many']);
	}
	
	/**
	 * @param array $plurals
	 * @return mixed|null
	 */
	protected function _queue(array $plurals){
		foreach($plurals as $plural){
			if(!empty($plural)){
				return $plural;
			}
		}
		return null;
	}
	
	/**
	 * @param array $plurals
	 * @return null|string
	 */
	protected function _queueN(array $plurals){
		foreach($plurals as $plural){
			if(!empty($this->{$plural})){
				return $this->{$plural};
			}
		}
		return null;
	}
	
	/**
	 * @param $number
	 * @return int
	 */
	protected function _split($number){
		$numString = "$number";
		if(is_float($number)){
			$numString = strstr($numString,'.',true);
		}
		$numbers = array_map('intval', str_split($numString));
		return array_splice($numbers,-2);
	}
	
}


