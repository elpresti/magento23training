<?php

/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\CustomerList\Controller\Repository;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Customer\Api\CustomerRepositoryInterface;


/**
 * Class Customer 
 * @package Unit5\CustomerList\Controller\Customactions      
 */
class Customer extends \Magento\Framework\App\Action\Action {
	
	/**
	 * @var CustomerRepositoryInterface
	 */
	private $customerRepository;
	/**
	 * @var SearchCriteriaBuilder
	 */
	private $searchCriteriaBuilder;
	/**
	 * @var FilterGroupBuilder
	 */
	private $filterGroupBuilder;
	/**
	 * @var FilterBuilder
	 */
	private $filterBuilder;
	
	public function __construct(
			Context $context,
			SearchCriteriaBuilder $searchCriteriaBuilder,
			CustomerRepositoryInterface $customerRepository,
			FilterGroupBuilder $filterGroupBuilder,
			FilterBuilder $filterBuilder
			){
		parent::__construct ( $context );
		$this->searchCriteriaBuilder = $searchCriteriaBuilder;
		$this->customerRepository = $customerRepository;
		$this->filterGroupBuilder = $filterGroupBuilder;
		$this->filterBuilder = $filterBuilder;
	}
	
	/**
	 * @return \Magento\Framework\View\Result\Page
	 */
	public function execute() {
		$this->getResponse()->setHeader('content-type', 'text/plain');
		$this->addEmailFilter();
		$this->addNameFilter();
		$customers = $this->getCustomersFromRepository();
		if(!empty($customers)) {
			$this->getResponse()->appendBody(
					sprintf("List contains %s\n\n", get_class($customers[0]))
			);
			$result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
			$result->setContents('Hello World!');
		}
		foreach ($customers as $customer) {
			$this->outputCustomer($customer);
		}
		
	}
	
	private function addEmailFilter() {
		$emailFilter = $this->filterBuilder->setField('email')
			->setValue('%@example.com')->setConditionType('like')->create();
		$this->filterGroupBuilder->addFilter($emailFilter);
	}
	
	private function addNameFilter() {
		$nameFilter = $this->filterBuilder->setField('firstname')
			->setValue('Veronica')->setConditionType('eq')->create();
		$this->filterGroupBuilder->addFilter($nameFilter);
	}
	
	/**
	 * @return \Magento\Customer\Api\Data\CustomerInterface[]
	 */
	private function getCustomersFromRepository() {
		$this->searchCriteriaBuilder->setFilterGroups(
			[$this->filterGroupBuilder->create()]
		);
		$criteria = $this->searchCriteriaBuilder->create();
		$customers = $this->customerRepository->getList($criteria);
		return $customers->getItems();
	}
	
	private function outputCustomer(
			\Magento\Customer\Api\Data\CustomerInterface $customer
			) {
				$this->getResponse()->appendBody(sprintf(
						"\"%s %s\" <%s> (%s)\n",
						$customer->getFirstname(),
						$customer->getLastname(),
						$customer->getEmail(),
						$customer->getId()
						));
	}

} 