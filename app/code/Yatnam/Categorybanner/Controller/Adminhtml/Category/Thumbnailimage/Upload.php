<?php

namespace Yatnam\Categorybanner\Controller\Adminhtml\Category\Thumbnailimage;

use Magento\Framework\Controller\ResultFactory;
use Psr\Log\LoggerInterface;

/**
 * Class Upload
 */
class Upload extends \Magento\Backend\App\Action
{
    protected $baseTmpPath;
    protected $imageUploader;
    protected $logger;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Catalog\Model\ImageUploader $imageUploader,
        LoggerInterface $logger
    ) {
        $this->imageUploader = $imageUploader;
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $this->logger->info('Attempting to upload image...');
            $result = $this->imageUploader->saveFileToTmpDir('category_banner_image');
            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
            $this->logger->info('Image uploaded successfully.');
        } catch (\Exception $e) {
            $this->logger->error('Error occurred while uploading image: ' . $e->getMessage());
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
