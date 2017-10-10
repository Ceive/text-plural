<?php
/**
 * @Creator Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Author: Alexey Kutuzov <lexus27.khv@gmai.com>
 * @Project: ceive.text-plural
 */

namespace Ceive\Text;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class PluralTemplate
 * @package Ceive\Text
 */
class PluralTemplate extends Plural{
	
	public static $default_placeholder = '*';
	
	protected $placeholder;
	
	/**
	 * Plural constructor.
	 * @param $single
	 * @param $several
	 * @param $many
	 * @param $zero
	 * @param string $placeholder
	 */
	public function __construct($single, $several, $many, $zero = null, $placeholder = null){
		parent::__construct($single, $several, $many, $zero);
		$this->placeholder = $placeholder?:self::$default_placeholder;
	}
	
	/**
	 * @param $number
	 * @param $tpl
	 * @return string
	 */
	protected function _processTpl($number, $tpl){
		return strtr($tpl, [
			$this->placeholder => $number
		]);
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapZero($number){
		return $this->_processTpl($number, $this->pluralZero());
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapSingle($number){
		return $this->_processTpl($number, $this->pluralSingle());
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapSeveral($number){
		return $this->_processTpl($number, $this->pluralSingle());
	}
	
	/**
	 * @param $number
	 * @return string
	 */
	public function wrapMany($number){
		return $this->_processTpl($number, $this->pluralMany());
	}
	
}


