<?php

/**
 * Class Data
 *
 * PHP version 7
 *
 * @category Risecommerce
 * @package  Risecommerce_AbandonedCart
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */

namespace Risecommerce\AbandonedCart\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * StoreManagerInterface
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    public $storeManager;

    /**
     * CustomerFactory
     *
     * @var \Magento\Customer\Model\CustomerFactory
     */
    public $customerFactory;

    /**
     * Writer
     *
     * @var \Magento\Framework\App\Config\Storage\Writer
     */
    public $writer;

    /**
     * DirectoryList
     *
     * @var \Magento\Framework\App\Filesystem\DirectoryList
     */
    public $directoryList;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Connector Logger
     *
     * @var \Zend_Log
     */
    protected $connectorLogger;

    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context           $context         context
     * @param \Magento\Store\Model\StoreManagerInterface      $storeManager    storeManager
     * @param \Magento\Customer\Model\CustomerFactory         $customerFactory customerFactory
     * @param \Magento\Framework\App\Config\Storage\Writer    $writer          writer
     * @param \Magento\Framework\App\Filesystem\DirectoryList $directoryList   directoryList
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Framework\App\Config\Storage\Writer $writer,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->storeManager = $storeManager;
        $this->customerFactory = $customerFactory;
        $this->writer = $writer;
        $this->directoryList = $directoryList;
        $this->logger = $logger;
        parent::__construct($context);

        $logDir = $directoryList->getPath('log');
        if (! is_dir($logDir)) {
            mkdir($directoryList->getPath('var')  . DIRECTORY_SEPARATOR . 'log');
        }
        /* $writer = new \Zend\Log\Writer\Stream($logDir . DIRECTORY_SEPARATOR .  'cron.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);*/
        // $writer = new \Laminas\Log\Writer\Stream($logDir . DIRECTORY_SEPARATOR .  'cron.log');
        // $logger = new  \Laminas\Log\Logger();
        // $logger->addWriter($writer);

        $writer = new \Zend_Log_Writer_Stream($logDir . DIRECTORY_SEPARATOR .  'cron.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);

        $this->connectorLogger  = $logger;
    }

    /**
     * Get all stores.
     *
     * @param bool|false $default default
     *
     * @return \Magento\Store\Api\Data\StoreInterface[]
     */
    public function getStores($default = false)
    {
        return $this->storeManager->getStores($default);
    }

    /**
     * Get url for email capture.
     *
     * @return mixed
     */
    public function getEmailCaptureUrl()
    {
        return $this->storeManager->getStore()->getUrl(
            'risecommerce_abandoned_cart/ajax/emailcapture',
            ['_secure' => $this->storeManager->getStore()->isCurrentlySecure()]
        );
    }

    /**
     * Get url for email capture.
     *
     * @param string $data data
     *
     * @return void
     */
    public function log($data)
    {
        $this->connectorLogger->info($data);
    }

    /**
     * Get url for email capture.
     *
     * @param int $id id
     *
     * @return customername
     */
    public function getCustomerName($id = null)
    {
        if ($id) {
            $customer = $this->customerFactory->create()->load($id);
            return $customer->getName();
        } else {
            return 'Guest User';
        }
    }
}
