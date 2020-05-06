<?php

/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit4\MultiSelect\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute as CatalogAttribute;

/**
 *
 * @package Unit4\MultiSelect\Setup
 *         
 */
class CategoryAttr implements DataPatchInterface {

	/**
	 * @var CategorySetupFactory
	 */
	protected $categorySetupFactory;
	
	/**
	 * @var ModuleDataSetupInterface
	 */
	protected $moduleDataSetup;
	
	/**
	 * CategoryAttr constructor.
	 * @param CategorySetupFactory $categorySetupFactory        	
	 * @param ModuleDataSetupInterface $moduleDataSetup        	
	 */
	public function __construct(CategorySetupFactory $categorySetupFactory, ModuleDataSetupInterface $moduleDataSetup) {
		$this->categorySetupFactory = $categorySetupFactory;
		$this->moduleDataSetup = $moduleDataSetup;
	}
	
	/**
	 * @return DataPatchInterface|void
	 */
	public function apply() {
		$this->moduleDataSetup->startSetup ();
 		/** @var CategorySetup $catalogSetup */
		$catalogSetup = $this->categorySetupFactory->create([
				'setup' => $this->moduleDataSetup
		]);
		$catalogSetup->addAttribute ( Product::ENTITY, 'multiselectprodattr', [ 
				'type' => 'text',
				'input' => 'multiselect',
				'label' => 'Multiselect Prod Attr',
				'visible_on_front' => 1,
				'required' => 0,
				'global' => CatalogAttribute::SCOPE_STORE,
				'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
				'option' => ['values' => [
					'left',
					'right',
					'up',
					'down'
				]]
		] );
		$this->moduleDataSetup->endSetup ();
	}
	
	/**
	 * @return array|string[]
	 */
	public static function getDependencies() {
		return [ ];
	}
	
	/**
	 * @return array|string[]
	 */
	public function getAliases() {
		return [ ];
	}
} 

//1. en el constructor le tengo q pasar .../CategorySetup y alojarlo en _categorySetupFactory
//2. dentro del apply(){ debo llamar al $this->_categorySetupFactory->create() 
//y alojarlo en $categorySetup,
//3. llamar a $categorySetup->addAttribute('mycustomtextattribute',
/*SOME_MAGENTO_CLASS_OF_TYPE_TEXT::class,
[
'is_visible_on_frontend'=> true
]
)

*/