<?php

namespace Yatnam\CustomProductGrid\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Psr\Log\LoggerInterface;

class CvvAvs extends Column
{
    protected $_orderRepository;
    protected $logger;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        LoggerInterface $logger,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_orderRepository = $orderRepository;
        $this->logger = $logger;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $orderId = $item['entity_id'];
                $order = $this->_orderRepository->get($orderId);
                $additionalInformation = $order->getPayment()->getAdditionalInformation();
                $cvvResponseCode = isset($additionalInformation['cvvResponseCode']) ? $additionalInformation['cvvResponseCode'] : null;
                $avsPostalCodeResponseCode = isset($additionalInformation['avsPostalCodeResponseCode']) ? $additionalInformation['avsPostalCodeResponseCode'] : null;
                $avsStreetAddressResponseCode = isset($additionalInformation['avsStreetAddressResponseCode']) ? $additionalInformation['avsStreetAddressResponseCode'] : null;
                $item['cvv_response_code'] = $cvvResponseCode;
                $item['avs_postal_code_response_code'] = $avsPostalCodeResponseCode;
                $item['avs_street_address_response_code'] = $avsStreetAddressResponseCode;
            }
        }

        return $dataSource;
    }
}
