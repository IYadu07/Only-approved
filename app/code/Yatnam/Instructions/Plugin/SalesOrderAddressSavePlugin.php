<?php
namespace Yatnam\Instructions\Plugin;

class SalesOrderAddressSavePlugin
{
    protected $request;

    public function __construct(
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->request = $request;
    }

    public function aroundSave(
        \Magento\Sales\Model\ResourceModel\Order\Address $subject,
        \Closure $proceed,
        \Magento\Sales\Model\Order\Address $object
    ) {
        $deliveryInstructions = $this->request->getPost('shippingAddress')['delivery_instructions'] ?? null;

        // Check if the delivery instructions are set
        if ($deliveryInstructions !== null) {
            $object->setDeliveryInstructions($deliveryInstructions);
        }

        // Proceed with the original save method
        $result = $proceed($object);

        return $result;
    }
}
