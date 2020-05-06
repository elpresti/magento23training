<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\RouterDash\Controller;

/**
 * Class Router
 * 
 * @package Unit2\RouterDash\Controller
 *         
 */
class Router implements \Magento\Framework\App\RouterInterface {
	/**
	 *
	 * @var \Magento\Framework\App\ActionFactory
	 */
	protected $actionPath;
	
	/**
	 * Router constructor.
	 * 
	 * @param \Magento\Framework\App\ActionFactory $actionFactory        	
	 */
	public function __construct(\Magento\Framework\App\ActionFactory $actionFactory) {
		$this->actionPath = $actionFactory;
	}
	
	/**
	 *
	 * @param \Magento\Framework\App\RequestInterface $request        	
	 * @return \Magento\Framework\App\ActionInterface|null
	 */
	public function match(\Magento\Framework\App\RequestInterface $request) {
		//FIX: /frontName-actionPath-action
		$testCategory = 'id/6';
		$info = $request->getPathInfo ();
		if (preg_match ( "%^/(.*?)-(.*?)-(.*?)$%", $info, $m )) {
//		if (preg_match("%^/(test)-(.*?)-(.*?)$%", $info, $m)) {
			$request->setPathInfo ( sprintf ( "/%s/%s/%s/%s", $m [1], $m [2], $m [3], $testCategory ) );
			return $this->actionPath->create ( 'Magento\Framework\App\Action\Forward', [ 
					'request' => $request 
			] );
		}
		return null;
	}
	
} 