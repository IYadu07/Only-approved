<?php

namespace Yatnam\Payment\Plugin;

use Psr\Log\LoggerInterface;
use Magento\Payment\Model\Method\AbstractMethod;

class Cashondelivery
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function aroundIsAvailable(
        AbstractMethod $subject,
        callable $proceed
    ) {
        if ($subject->getCode() !== 'cashondelivery') {
            return $proceed();
        }
        if (!$this->isAdmin()) {
            return false;
        }
        $result = $proceed();
        return $result;
    }

    protected function isAdmin()
    {
        return \Magento\Framework\App\ObjectManager::getInstance()->get(\Magento\Framework\App\State::class)->getAreaCode() == \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE;
    }
}
