<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\TestBlock\Controller\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Text
 *
 * @package Unit3\TestBlock\Controller\Block
 *         
 */
class Text extends \Magento\Framework\App\Action\Action {
	
	/**
	 *
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $_pageFactory;
	
	/**
	 * Text constructor.
	 *
	 * @param \Magento\Framework\App\Action\Context $context        	
	 * @param \Magento\Framework\View\Result\PageFactory $pageFactory        	
	 */
	public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory) {
		$this->_pageFactory = $pageFactory;
		parent::__construct ( $context );
	}
	
	/**
	 *
	 * @return \Magento\Framework\Controller\ResultInterface
	 */
	public function execute() {
 		$block = $this->_pageFactory->create()->getLayout()->createBlock ( 'Magento\Framework\View\Element\Text' );
		$block->setText ( "Hello World From a New Module!" );
 		$result = $this->resultFactory->create ( \Magento\Framework\Controller\ResultFactory::TYPE_RAW );
		$result->setContents ( $block->toHtml () );
		return $result;
	}
	
}