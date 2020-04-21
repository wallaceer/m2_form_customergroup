<?php

namespace Ws\Customer\Block;


use Ws\Customer\Helper\Data;

/**
 * Class Customergroups
 * @package Ws\Customer\Block
 */
Class Customergroups extends \Magento\Framework\View\Element\Template {

    /**
     * Customer Group
     *
     * @var \Magento\Customer\Model\ResourceModel\Group\Collection
     */
    protected $_customerGroup;

    /**
     * @var Data
     */
    protected $_groups;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroup
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroup,
        \Magento\Customer\Model\SessionFactory $customerSession,
        array $data = [],
        Data $groups
    ) {
        $this->_customerGroup = $customerGroup;
        $this->_groups = $groups;
        $this->_customerSession = $customerSession->create();
        parent::__construct($context, $data);
    }
    
    /**
     * Get customer groups
     *
     * @return array
     */
    public function getCustomerGroups(): array {
        $customerGroups = $this->_customerGroup->toOptionArray();
        foreach ($customerGroups as $index=>$value){
            if(!in_array($value['value'], $this->getConfiguredGroups())){
                unset($customerGroups[$index]);
            }
        }
        //array_unshift($customerGroups, array('value'=>'', 'label'=>'Any'));
        return $customerGroups;
    }


    /**
     * @return array
     */
    protected function getConfiguredGroups(): array {
        return explode(",",$this->_groups->getConfiguredCustomerGroups());
    }


    /**
     * @return \Magento\Framework\App\Config\ScopeConfigInterface|mixed
     */
    public function getConfiguredShowPrivacy(){
        return $this->_groups->getConfiguredRuleToShow();
    }

    /**
     * @return bool
     */
    public function getLoggedinCustomerId() {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->_customerSession->getId();
        }
        return false;
    }

    /**
     * @return object
     */
    public function getCustomerData() {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->_customerSession->getCustomerData();
        }
        return false;
    }

}