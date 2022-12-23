<?php
/**
 * Class Collection
 *
 * PHP version 7
 *
 * @category Risecommerce
 * @package  Risecommerce_AbandonedCart
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */
namespace Risecommerce\AbandonedCart\Model\ResourceModel\Cron;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * IdFieldName
     *
     * @var string
     */
    protected $_idFieldName = 'schedule_id';

    /**
     * Initialize resource collection
     *
     * @return null
     */
    public function _construct()
    {
        $this->_init(\Magento\Cron\Model\Schedule::class, \Magento\Cron\Model\ResourceModel\Schedule::class);
    }
}
