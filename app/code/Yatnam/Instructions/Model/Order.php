<?php
namespace Yatnam\Instructions\Model;

use Magento\Framework\Model\AbstractModel;

class Order extends AbstractModel
{
    /**
     * Get delivery instructions
     *
     * @return string|null
     */
    public function getDeliveryInstructions()
    {
        return $this->_getData('delivery_instructions');
    }
}
