<?php
/**
 * @Creator Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Author: Alexey Kutuzov <lexus27.khv@gmai.com>
 * @Project: ceive.text-plural
 */

namespace Ceive\Text;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class PluralInterface
 * @package Ceive\Text
 */
interface PluralInterface{
	
	public function render($number);
	
	
	public function wrapZero($number);
	
	public function wrapSingle($number);
	
	public function wrapSeveral($number);
	
	public function wrapMany($number);
	
}


