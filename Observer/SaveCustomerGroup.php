<?php

namespace Ws\Customer\Observer;

use Magento\Framework\Event\ObserverInterface;

class SaveCustomerGroup implements ObserverInterface
{
    const CUSTOMER_GROUP_ID = 2;

    protected $_customerRepositoryInterface;

    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        if ($customer->getGroupId() == 1) {
            $customer->setGroupId(self::CUSTOMER_GROUP_ID);
            $this->_customerRepositoryInterface->save($customer);;
        }
    }
}