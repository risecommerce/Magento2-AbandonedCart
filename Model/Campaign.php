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
namespace Risecommerce\AbandonedCart\Model;


class Campaign extends \Magento\Framework\Model\AbstractModel
{
    /**
     * DateTime
     *
     * @var \Magento\Framework\Stdlib\DateTime
     */
    public $dateTime;

    /**
     * Construct
     *
     * @param \Magento\Framework\Model\Context                        $context            context
     * @param \Magento\Framework\Registry                             $registry           registry
     * @param \Magento\Framework\Stdlib\DateTime                      $dateTime           dateTime
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource           resource
     * @param \Magento\Framework\Data\Collection\AbstractDb           $resourceCollection resourceCollection
     * @param array                                                   $data               data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Stdlib\DateTime $dateTime,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->dateTime = $dateTime;
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }

    /**
     * Constructor.
     *
     * @return null
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init(\Risecommerce\AbandonedCart\Model\ResourceModel\Campaign::class);
    }

    /**
     * Prepare data to be saved to database.
     *
     * @return $this
     */
    public function beforeSave()
    {
        parent::beforeSave();
        if ($this->isObjectNew()) {
            $this->setCreatedAt($this->dateTime->formatDate(true));
        }
        $this->setUpdatedAt($this->dateTime->formatDate(true));

        return $this;
    }
}
