<?php

namespace Ws\Customer\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    public function getConfig($path = '')
    {
        if ($path) return $this->scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $this->scopeConfig;
    }


    public function getConfiguredCustomerGroups(){
        return $this->getConfig('ws_customer/ws_form/ws_groups');
    }

    public function getConfiguredRuleToShow(){
        return $this->getConfig('ws_customer/ws_form/ws_show_privacy');
    }

}

