<?php

namespace Ws\Customer\Block;

//use Magento\Customer\Model\ResourceModel\Group\Collection as CustomerGroup;

Class Customergroups extends \Magento\Framework\View\Element\Template {

    public $_customerGroup;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        //,
        //CustomerGroup $customerGroup
        array $data = []
    ) {
        //$this->_customerGroup = $customerGroup;
        parent::__construct($context, $data);
    }

    public function getCustomerGroup() {
        //$groups = $this->_customerGroup->toOptionArray();
        $groups = ['a','b'];
        return $groups;
    }
}