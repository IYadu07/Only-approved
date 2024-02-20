<?php

namespace Yatnam\Instructions\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Sales\Api\OrderRepositoryInterface;
use Psr\Log\LoggerInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\Registry;
use Magento\Sales\Model\Order;

class SaveDeliveryInstructionsObserver implements ObserverInterface
{
    protected $registry;
    protected $logger;
    protected $orderRepository;
    protected $checkoutSession;

    public function __construct(
        Registry $registry,
        CheckoutSession $checkoutSession,
        LoggerInterface $logger,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->registry = $registry;
        $this->checkoutSession = $checkoutSession;
        $this->logger = $logger;
        $this->orderRepository = $orderRepository;
    }

    public function execute(Observer $observer)
    {
        $deliveryInstructions = $observer->getEvent()->getData('delivery_instructions');
        $orderId = $this->checkoutSession->getLastOrderId();
        $this->logger->info("orderId: $orderId");
        $this->logger->info("Delivery instruction inside observer: $deliveryInstructions");
        $order = $this->orderRepository->get($orderId);
        $order->setData('delivery_instructions', $deliveryInstructions);
        $this->orderRepository->save($order);
    }
}
