<?php
/**
 * Class Cron
 *
 * PHP version 7
 *
 * @category Risecommerce
 * @package  Risecommerce_AbandonedCart
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */
namespace Risecommerce\AbandonedCart\Model;

class Cron
{
    /**
     * QuoteFactory
     *
     * @var Sales\QuoteFactory
     */
    public $quoteFactory;

    /**
     * HelperData
     *
     * @var \Risecommerce\AbandonedCart\Helper\Data
     */
    public $helper;

    /**
     * CollectionFactory
     *
     * @var ResourceModel\Cron\CollectionFactory
     */
    public $cronCollection;

    /**
     * Cron constructor.
     *
     * @param Sales\QuoteFactory                    $quoteFactory   quoteFactory
     * @param \Risecommerce\AbandonedCart\Helper\Data $helper         helper
     * @param ResourceModel\Cron\CollectionFactory  $cronCollection cronCollection
     */
    public function __construct(
        \Risecommerce\AbandonedCart\Model\Sales\QuoteFactory $quoteFactory,
        \Risecommerce\AbandonedCart\Helper\Data $helper,
        \Risecommerce\AbandonedCart\Model\ResourceModel\Cron\CollectionFactory $cronCollection
    ) {
        $this->quoteFactory = $quoteFactory;
        $this->helper = $helper;
        $this->cronCollection = $cronCollection;
    }

    /**
     * CRON FOR ABANDONED CARTS.
     *
     * @return null
     */
    public function abandonedCarts()
    {
        if ($this->jobHasAlreadyBeenRun('risecommerce_abandoned_cart')) {
            $this->helper->log('Skipping risecommerce_abandoned_cart job run');
            return;
        }
        $this->quoteFactory->create()->processAbandonedCarts();
    }

    /**
     * Check if already ran for same time
     *
     * @param string $jobCode jobCode
     *
     * @return bool
     */
    public function jobHasAlreadyBeenRun($jobCode)
    {
        $currentRunningJob = $this->cronCollection->create()
            ->addFieldToFilter('job_code', $jobCode)
            ->addFieldToFilter('status', 'running')
            ->setPageSize(1);

        if ($currentRunningJob->getSize()) {
            $jobOfSameTypeAndScheduledAtDateAlreadyExecuted =  $this->cronCollection->create()
                ->addFieldToFilter('job_code', $jobCode)
                ->addFieldToFilter('scheduled_at', $currentRunningJob->getFirstItem()->getScheduledAt())
                ->addFieldToFilter('status', ['in' => ['success', 'failed']]);

            return ($jobOfSameTypeAndScheduledAtDateAlreadyExecuted->getSize()) ? true : false;
        }

        return false;
    }
}
