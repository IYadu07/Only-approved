<?php
namespace Yatnam\Instructions\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\ResourceModel\Order as OrderResource;
use Psr\Log\LoggerInterface;

class SaveDeliveryInstructionsObserver implements ObserverInterface
{
    protected $orderRepository;
    protected $orderResource;
    protected $logger;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        OrderResource $orderResource,
        LoggerInterface $logger
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderResource = $orderResource;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        try {
            $order = $observer->getOrder();
            $deliveryInstructions = $order->getDeliveryInstructions();

            if ($deliveryInstructions !== null) {
                // Save delivery instructions to sales_order table
                $order->setData('delivery_instructions', $deliveryInstructions);
                $this->orderRepository->save($order);

                // Save delivery instructions to sales_order_grid table
                $this->orderResource->getConnection()->update(
                    $this->orderResource->getMainTable(),
                    ['delivery_instructions' => $deliveryInstructions],
                    ['entity_id = ?' => $order->getId()]
                );
            } else {
                $this->logger->error('Delivery instructions are empty.');
            }
        } catch (\Exception $e) {
            $this->logger->error('An error occurred while saving delivery instructions: ' . $e->getMessage());
        }
    }
}
