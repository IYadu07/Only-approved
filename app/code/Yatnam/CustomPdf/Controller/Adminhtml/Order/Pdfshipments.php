<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Yatnam\CustomPdf\Controller\Adminhtml\Order;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Ui\Component\MassAction\Filter;
use Yatnam\CustomPdf\Model\Order\Pdf\Shipment;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Sales\Model\ResourceModel\Order\Shipment\CollectionFactory as ShipmentCollectionFactory;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Psr\Log\LoggerInterface; // Import the logger interface

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Pdfshipments extends \Magento\Sales\Controller\Adminhtml\Order\AbstractMassAction
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Magento_Sales::ship';

    /**
     * @var FileFactory
     */
    protected $fileFactory;

    /**
     * @var DateTime
     */
    protected $dateTime;

    /**
     * @var Shipment
     */
    protected $pdfShipment;

    /**
     * @var ShipmentCollectionFactory
     */
    protected $shipmentCollectionFactory;

    /**
     * @var LoggerInterface
     */
    protected $logger; // Logger property

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param DateTime $dateTime
     * @param FileFactory $fileFactory
     * @param Shipment $shipment
     * @param ShipmentCollectionFactory $shipmentCollectionFactory
     * @param LoggerInterface $logger // LoggerInterface dependency
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        DateTime $dateTime,
        FileFactory $fileFactory,
        Shipment $shipment,
        ShipmentCollectionFactory $shipmentCollectionFactory,
        LoggerInterface $logger // Inject the logger
    ) {
        $this->fileFactory = $fileFactory;
        $this->dateTime = $dateTime;
        $this->pdfShipment = $shipment;
        $this->collectionFactory = $collectionFactory;
        $this->shipmentCollectionFactory = $shipmentCollectionFactory;
        $this->logger = $logger; // Assign the injected logger
        parent::__construct($context, $filter);
    }

    /**
     * Print shipments for selected orders
     *
     * @param AbstractCollection $collection
     * @return ResponseInterface|\Magento\Backend\Model\View\Result\Redirect
     * @throws \Exception
     */
    protected function massAction(AbstractCollection $collection)
    {
        $this->logger->info('Reached Pdfshipments controller.'); // Log that controller is reached

        $shipmentsCollection = $this->shipmentCollectionFactory
            ->create()
            ->setOrderFilter(['in' => $collection->getAllIds()]);
        if (!$shipmentsCollection->getSize()) {
            $this->messageManager->addErrorMessage(__('There are no printable documents related to selected orders.'));
            return $this->resultRedirectFactory->create()->setPath($this->getComponentRefererUrl());
        }

        $pdf = $this->pdfShipment->getPdf($shipmentsCollection->getItems());
        $fileContent = ['type' => 'string', 'value' => $pdf->render(), 'rm' => true];

        return $this->fileFactory->create(
            sprintf('packingslip%s.pdf', $this->dateTime->date('Y-m-d_H-i-s')),
            $fileContent,
            DirectoryList::VAR_DIR,
            'application/pdf'
        );
    }
}
