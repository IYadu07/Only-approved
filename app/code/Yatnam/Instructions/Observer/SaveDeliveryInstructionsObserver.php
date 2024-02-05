<?php
namespace Yatnam\Instructions\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Address;
use Magento\Sales\Model\Order\AddressRepository;

class SaveDeliveryInstructionsObserver implements ObserverInterface
{
    protected $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var Order $order */
        $order = $observer->getOrder();

        /** @var Address $shippingAddress */
        $shippingAddress = $order->getShippingAddress();

        // Get delivery instructions from the shipping address
        $deliveryInstructions = $shippingAddress->getDeliveryInstructions();

        // Check if delivery instructions exist and update the sales_order_address table
        if ($deliveryInstructions !== null) {
            try {
                $shippingAddressId = $shippingAddress->getId();
                $address = $this->addressRepository->get($shippingAddressId);
                $address->setDeliveryInstructions($deliveryInstructions);
                $this->addressRepository->save($address);
            } catch (\Exception $exception) {
                // Log the exception for debugging purposes
                $this->logger->error($exception->getMessage());
            }
        }
    }
}
