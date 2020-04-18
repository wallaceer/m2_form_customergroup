<?php

namespace Ws\Customer\Observer;

use Magento\Framework\Event\ObserverInterface;

class SaveCustomerGroup implements ObserverInterface
{
    const CUSTOMER_GROUP_ID = 1;

    protected $_customerRepositoryInterface;

    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /*$customer = $observer->getEvent()->getCustomer();
        if ($customer->getGroupId() == 1) {
            $customer->setGroupId(self::CUSTOMER_GROUP_ID);
            $this->_customerRepositoryInterface->save($customer);
        }*/

        $accountController = $observer->getAccountController();
        $request = $accountController->getRequest();
        $group_id = preg_match("/[0-9]+/", $request->getParam('group_id')) ? $request->getParam('group_id'): self::CUSTOMER_GROUP_ID;

        try{

            $customer = $observer->getEvent()->getCustomer();
            $customer->setGroupId($group_id);
            $this->_customerRepositoryInterface->save($customer);

        } catch(\Exception $e){
            echo $e->getMessage();
        }



    }
}