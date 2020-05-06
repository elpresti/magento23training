<?php
/**
 *
* Copyright © Magento. All rights reserved.
* See COPYING.txt for license details.
*/
namespace Unit3\Layout\Controller\Layout;
/**
* Class Onepage
* @package Unit3\Layout\Controller\Layout
*/
class Onepage extends \Magento\Framework\App\Action\Action
{
	/**
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $_pageFactory;
	/**
	 * Onepage constructor.
	 * @param \Magento\Framework\App\Action\Context $context
	 * @param \Magento\Framework\View\Result\PageFactory $pageFactory
	 */
	public function __construct(
			\Magento\Framework\App\Action\Context $context,
			\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}
	/**
	 * @return \Magento\Framework\View\Result\Page
	 */
	public function execute()
	{
		return $this->_pageFactory->create();
	}
}