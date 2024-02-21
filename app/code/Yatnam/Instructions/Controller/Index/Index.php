<?php

namespace Yatnam\Instructions\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Psr\Log\LoggerInterface;
// use Magento\Framework\Registry;
use Magento\Framework\Event\ManagerInterface as EventManager;

class Index extends Action
{
    // protected $resultJsonFactory;
    // protected $logger;
    // protected $eventManager;
    // // protected $registry;

    // public function __construct(
    //     Context $context,
    //     JsonFactory $resultJsonFactory,
    //     LoggerInterface $logger,
    //     EventManager $eventManager

    //     // Registry $registry
    // ) {
    //     parent::__construct($context);
    //     $this->resultJsonFactory = $resultJsonFactory;
    //     $this->logger = $logger;
    //     $this->eventManager = $eventManager;
    //     // $this->registry = $registry;
    // }

    public function execute()
    {
        print_r("hello world");
        // $deliveryInstructions = $this->getRequest()->getParam('delivery_instructions');
        // $this->logger->info("delivery instructions$deliveryInstructions");
        // // $this->registry->register('DeliveryInstruction', $deliveryInstructions);
        // // $newdeliveryInstructions = $this->registry->registry('DeliveryInstruction');
        // $this->logger->info("new Delivery Instructions: $deliveryInstructions");
        // if (!$deliveryInstructions) {
        //     $this->logger->error('Delivery instructions not found');
        //     $result = $this->resultJsonFactory->create();
        //     return $result->setData(['success' => false, 'message' => 'Delivery instructions or order ID not found.']);
        // } else {
        //     $this->eventManager->dispatch('custom_delivery_instructions', ['delivery_instructions' => $deliveryInstructions]);
        //     $result = $this->resultJsonFactory->create();
        //     return $result->setData(['success' => true]);
        // }
    }
}
