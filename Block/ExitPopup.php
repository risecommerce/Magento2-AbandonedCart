<?php
/**
 * Class ExitPopup
 *
 * PHP version 7
 *
 * @category Risecommerce
 * @package  Risecommerce_AbandonedCart
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */
namespace Risecommerce\AbandonedCart\Block;


class ExitPopup extends \Magento\Framework\View\Element\Template
{

    /**
     * CartHelper
     *
     * @var \Magento\Checkout\Helper\Cart
     */
    protected $cartHelper;

    /**
     * CustomerSessionProxy
     *
     * @var \Magento\Customer\Model\Session\Proxy
     */
    protected $customerSession;

    /**
     * CheckoutSessionProxy
     *
     * @var \Magento\Checkout\Model\Session\Proxy
     */
    protected $checkoutSession;

    /**
     * ExitPopup constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context         context
     * @param \Magento\Checkout\Helper\Cart                    $cartHelper      cartHelper
     * @param \Magento\Customer\Model\Session\Proxy            $customerSession customerSession
     * @param \Magento\Checkout\Model\Session\Proxy            $checkoutSession checkoutSession
     * @param array                                            $data            data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Helper\Cart $cartHelper,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->cartHelper = $cartHelper;
        $this->customerSession = $customerSession;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * IsCartEmpty
     *
     * @return bool
     */
    public function isCartEmpty()
    {
        if ($this->cartHelper->getItemsCount() === 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * IsGuestUser
     *
     * @return bool
     */
    public function isGuestUser()
    {
        if ($this->customerSession->isLoggedIn()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * IsQuoteEmailEmpty
     *
     * @return bool
     */
    public function isQuoteEmailEmpty()
    {
        $quote = $this->checkoutSession->getQuote();
        if ($quote->getCustomerEmail()) {
            return false;
        } else {
            return true;
        }
    }
}
