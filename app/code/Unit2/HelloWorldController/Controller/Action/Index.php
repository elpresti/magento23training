<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\HelloWorldController\Controller\Action;

/**
 * Class Index
 *
 * @package Unit2\HelloWorldController\Controller\Action
 *         
 */
class Index extends \Magento\Framework\App\Action\Action {
	/**
	 *
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $_pageFactory;
	/**
	 * Index constructor.
	 *
	 * @param \Magento\Framework\App\Action\Context $context        	
	 * @param \Magento\Framework\View\Result\PageFactory $pageFactory        	
	 */
	public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory) {
		$this->_pageFactory = $pageFactory;
		return parent::__construct ( $context );
	}
	/**
	 *
	 * @return \Magento\Framework\Controller\ResultInterface
	 */
	public function execute() {
		$result = $this->resultFactory->create ( \Magento\Framework\Controller\ResultFactory::TYPE_RAW );
		$result->setContents ( 'Hello World' );
		return $result;
	}
}
