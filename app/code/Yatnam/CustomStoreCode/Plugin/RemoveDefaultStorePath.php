<?php

namespace Yatnam\CustomStoreCode\Plugin;

class RemoveDefaultStorePath
{
    const ADMIN_CODE = 'admin';

    public function afterIsUseStoreInUrl(\Magento\Store\Model\Store $subject)
    {
        $storeCode = $subject->getCode();

        return $storeCode !== 'us' && ($storeCode === self::ADMIN_CODE || true);
    }
}
