<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\ProductViewDescriptionPlugin\Block\Product\View;

/**
 * Class Description
 * 
 * @package Unit3\ProductViewDescriptionPlugin\Block\Product\View
 *         
 */
class Description extends \Magento\Framework\View\Element\Template {
	/**
	 *
	 * @param \Magento\Catalog\Block\Product\View\Description $description        	
	 */
	public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description) {
		$description->getProduct ()->setDescription ( 'test description!' );
	}
	
}