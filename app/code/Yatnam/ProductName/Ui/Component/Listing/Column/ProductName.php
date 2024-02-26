<?php

namespace Yatnam\ProductName\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class ProductName extends Column
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        OrderRepositoryInterface $orderRepository,
        ProductRepositoryInterface $productRepository,
        array $components = [],
        array $data = []
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $orderId = $item['entity_id'];
                $order = $this->orderRepository->get($orderId);
                $productNames = [];
                foreach ($order->getAllVisibleItems() as $orderItem) {
                    $product = $this->productRepository->getById($orderItem->getProductId());
                    $productNames[] = $product->getName();
                }
                $item[$this->getData('name')] = implode(", ", $productNames);
            }
        }

        return $dataSource;
    }
}
