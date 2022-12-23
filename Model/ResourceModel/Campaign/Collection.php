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
 * @link     https://www.risecommerce.comm
 */
namespace Risecommerce\AbandonedCart\Model\ResourceModel\Campaign;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * IdFieldName
     *
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Initialize resource collection.
     *
     * @return null
     */
    public function _construct()
    {
        $this->_init(
            \Risecommerce\AbandonedCart\Model\Campaign::class,
            \Risecommerce\AbandonedCart\Model\ResourceModel\Campaign::class
        );
    }
}
