<?php

namespace Yatnam\Instructions\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class SaveDeliveryInstructionsObserver implements ObserverInterface
{
    protected $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // Retrieve the value passed from the controller
        $deliveryInstructions = $observer->getData('delivery_instructions');
        $this->logger->info("Value passed from controller: " . $deliveryInstructions);

        $order = $observer->getEvent()->getOrder();
        if ($deliveryInstructions !== null) {
            $order->setData('delivery_instructions', $deliveryInstructions);
            $order->save();
        }
    }
}
