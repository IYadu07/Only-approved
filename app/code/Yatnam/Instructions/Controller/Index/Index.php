<?php

namespace Yatnam\Instructions\Controller\Index;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\ObserverInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
    protected $logger;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Psr\Log\LoggerInterface $logger,
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->logger = $logger;
        return parent::__construct($context);
    }

    public function execute()
    {
        $request = $this->getRequest();
        $deliveryInstructions = $request->getParam('delivery_instructions');
        $this->logger->info($deliveryInstructions);
        $order = $observer->getEvent()->getOrder();
        if ($deliveryInstructions !== null) {
            $order->setData('delivery_instructions', $deliveryInstructions);
            $order->save();
            $result = $this->resultJsonFactory->create();
            return $result->setData(['success' => true]);
        }
    }
}
