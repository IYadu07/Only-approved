<?php

namespace Yatnam\CountryFlag\Ui\Component\Listing\Column;

use Magento\Framework\View\Asset\Repository as AssetRepository;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Sales\Model\Order\AddressRepository;
use Psr\Log\LoggerInterface;

class CountryFlag extends Column
{
    protected $logger;
    protected $addressRepository;
    protected $assetRepository;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        LoggerInterface $logger,
        AddressRepository $addressRepository,
        AssetRepository $assetRepository,
        array $components = [],
        array $data = []
    ) {
        $this->logger = $logger;
        $this->addressRepository = $addressRepository;
        $this->assetRepository = $assetRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $countryId = $this->getAddressCountryId($item['entity_id']);
                $this->logger->info("Country ID: $countryId");
                $flagUrl = $this->assetRepository->getUrl("Yatnam_CountryFlag::images/IN.svg");
                $this->logger->info("Flag URL: $flagUrl");

                $item[$this->getData('name')] = '<img src="' . $flagUrl . '" />';
            }
        }
        return $dataSource;
    }

    protected function getAddressCountryId($addressId)
    {
        try {
            $address = $this->addressRepository->get($addressId);
            return $address->getCountryId();
        } catch (\Exception $e) {
            return null;
        }
    }
}
