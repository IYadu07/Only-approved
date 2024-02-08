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
        $deliveryInstructions = $this->checkoutSession->getDeliveryInstructions();
        
        if ($deliveryInstructions !== null) {
            $order->setData('delivery_instructions', $deliveryInstructions);
            $order->save();
        }
    }
}
