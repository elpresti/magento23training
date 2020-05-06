<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\CatalogProductPlugin\Controller\Product;

/**
 * Class View
 * 
 * @package Unit2\CatalogProductPlugin\Controller\Product
 *         
 */
class View extends \Magento\Framework\App\Action\Action {
	
	/**
	 *
	 * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
	 */
	public function execute() {
		return $this->resultFactory->create ( 'raw' )->setContents ( ' echo plugin ' );
	}
	
	/**
	 *
	 * @param \Magento\Catalog\Controller\Product\View $controller        	
	 * @param
	 *        	$result
	 * @return mixed
	 */
	public function afterExecute(\Magento\Catalog\Controller\Product\View $controller, $result) {
		/**
		 * Custom code goes here
		 */
		return $result;
	}
	
}