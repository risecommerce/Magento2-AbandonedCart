<?php
/**
 * Class Emailcapture
 *
 * PHP version 7
 *
 * @category Risecommerce
 * @package  Risecommerce_AbandonedCart
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */
namespace Risecommerce\AbandonedCart\Controller\Ajax;

class Emailcapture extends \Magento\Framework\App\Action\Action
{
    /**
     * Quote
     *
     * @var \Magento\Quote\Model\ResourceModel\Quote
     */
    public $quoteResource;

    /**
     * Session
     *
     * @var \Magento\Checkout\Model\Session
     */
    public $checkoutSession;
    /**
     * JsonFactory
     *
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    public $resultJsonFactory;

    /**
     * Emailcapture constructor.
     *
     * @param \Magento\Quote\Model\ResourceModel\Quote         $quoteResource     quoteResource
     * @param \Magento\Checkout\Model\Session                  $session           session
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory resultJsonFactory
     * @param \Magento\Framework\App\Action\Context            $context           context
     */
    public function __construct(
        \Magento\Quote\Model\ResourceModel\Quote $quoteResource,
        \Magento\Checkout\Model\Session $session,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\App\Action\Context $context
    ) {
        $this->quoteResource = $quoteResource;
        $this->checkoutSession = $session;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    /**
     * Execute
     *
     * @return mixed
     */
    public function execute()
    {
        $email = $this->getRequest()->getParam('email');
        $resultJson = $this->resultJsonFactory->create();
        if ($email && $quote = $this->checkoutSession->getQuote()) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $resultJson->setData(['error' => 'Email is not Valid!']);
            }

            if ($quote->hasItems()) {
                try {
                    $quote->setCustomerEmail($email);
                    $this->quoteResource->save($quote);
                    return $resultJson->setData(['success' => 'Subscribed Successfully!']);
                } catch (\Exception $e) {
                    return $resultJson->setData(['error' => $e->getMessage()]);
                }
            } else {
                return $resultJson->setData(['error' => 'No quote items!']);
            }
        }
    }
}
