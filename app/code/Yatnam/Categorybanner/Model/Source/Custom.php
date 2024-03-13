<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Yatnam\Categorybanner\Model\Source;

/**
 * @api
 * @since 100.0.2
 */
class Custom extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Black'), 'value' => 1],
                ['label' => __('White'), 'value' => 2],
            ];
        }
        return $this->_options;
    }
}
