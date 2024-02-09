<?php
namespace Yatnam\Instructions\Observer;

class SaveDeliveryInstructionsObserver implements \Magento\Framework\Event\ObserverInterface
{
    protected $checkoutSession;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession
    ) {
        $this->checkoutSession = $checkoutSession;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        
        // Retrieve delivery instructions from the request payload
        $request = $observer->getEvent()->getRequest();
        $deliveryInstructions = $request->getParam('delivery_instructions');

        if ($deliveryInstructions !== null) {
            // Set delivery instructions in the order object
            $order->setData('delivery_instructions', $deliveryInstructions);
            $order->save();
        }
    }
}
