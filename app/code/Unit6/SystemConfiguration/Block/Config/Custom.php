<?php

/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit6\SystemConfiguration\Block\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class Custom
 * @package Unit6\SystemConfiguration\Block\Config     
 */
class Custom extends Field {

	/**
	 * @param AbstractElement $element        	
	 * @return string
	 */
	protected function _getElementHtml(AbstractElement $element) {
		return 'This is custom config block output';
	}

} 