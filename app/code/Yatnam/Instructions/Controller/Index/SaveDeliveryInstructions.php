<?php

namespace Yatnam\Instructions\Controller\Index;

class SaveDeliveryInstructions extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $request = $this->getRequest();
        $deliveryInstructions = $request->getParam('delivery_instructions');

        // Trigger your Observer
        // Example:
        $this->_eventManager->dispatch(
            'delivery_instructions_save_before',
            ['delivery_instructions' => $deliveryInstructions]
        );

        // Return a JSON response
        $result = $this->resultJsonFactory->create();
        return $result->setData(['success' => true]);
    }
}
