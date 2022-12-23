<?php
/**
 * Class Campaign
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

class Campaign extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * DateTime
     *
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    public $datetime;

    /**
     * RuleFactory
     *
     * @var \Magento\SalesRule\Model\RuleFactory
     */
    public $ruleFactory;

    /**
     * MassgeneratorFactory
     *
     * @var \Magento\SalesRule\Model\Coupon\MassgeneratorFactory
     */
    public $massGeneratorFactory;

    /**
     * CouponFactory
     *
     * @var \Magento\SalesRule\Model\CouponFactory
     */
    public $couponFactory;

    /**
     * Coupon
     *
     * @var \Magento\SalesRule\Model\ResourceModel\Coupon
     */
    public $coupon;

    /**
     * Rule
     *
     * @var \Magento\SalesRule\Model\ResourceModel\Rule
     */
    public $ruleResource;

    /**
     * Initialize resource.
     *
     * @return null
     */
    public function _construct()
    {
        $this->_init('risecommerce_abandoned_cart_email_campaign', 'id');
    }
}
