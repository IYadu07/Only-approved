<?php

namespace Yatnam\CustomQty\Controller\Cart;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Checkout\Model\Cart;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $jsonFactory;
    protected $cart;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        Cart $cart
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->cart = $cart;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->jsonFactory->create();
        $cartItemId = $this->getRequest()->getParam('cart-item-id');

        if ($cartItemId) {
            try {
                $this->cart->removeItem($cartItemId)->save();
                $result->setData(['success' => true]);
            } catch (\Exception $e) {
                $result->setData(['success' => false, 'error' => $e->getMessage()]);
            }
        } else {
            $result->setData(['success' => false, 'error' => 'Cart item ID not provided']);
        }

        return $result;
    }
}
