<?php

namespace Ws\Customer\Block;


Class Customergroups extends \Magento\Framework\View\Element\Template {

    /**
     * Customer Group
     *
     * @var \Magento\Customer\Model\ResourceModel\Group\Collection
     */
    protected $_customerGroup;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroup
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroup,
        array $data = []
    ) {
        $this->_customerGroup = $customerGroup;
        parent::__construct($context, $data);
    }
    /**
     * Get customer groups
     *
     * @return array
     */
    public function getCustomerGroups() {
        $customerGroups = $this->_customerGroup->toOptionArray();
        array_unshift($customerGroups, array('value'=>'', 'label'=>'Any'));
        return $customerGroups;
    }
}