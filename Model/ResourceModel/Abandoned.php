<?php
/**
 * Class Abandoned
 *
 * PHP version 7
 *
 * @category Risecommerce
 * @package  Risecommerce_AbandonedCart
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */
namespace Risecommerce\AbandonedCart\Model\ResourceModel;

class Abandoned extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * HelperData
     *
     * @var \Risecommerce\AbandonedCart\Helper\Data
     */
    public $helper;

    /**
     * Initialize resource.
     *
     * @return null
     */
    public function _construct()
    {
        $this->_init('risecommerce_abandoned_cart', 'id');
    }

    /**
     * Construct
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context context
     * @param \Risecommerce\AbandonedCart\Helper\Data             $data    data
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Risecommerce\AbandonedCart\Helper\Data $data
    ) {
        $this->helper = $data;
        parent::__construct($context);
    }
}
