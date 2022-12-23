<?php
/**
 * Class Intervalminute
 *
 * PHP version 7
 *
 * @category Risecommerce
 * @package  Risecommerce_AbandonedCart
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */
namespace Risecommerce\AbandonedCart\Model\Config\Source\Carts;

class Intervalminute implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Lost basket hour options.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '15', 'label' => __('15 Minutes')],
            ['value' => '20', 'label' => __('20 Minutes')],
            ['value' => '25', 'label' => __('25 Minutes')],
            ['value' => '30', 'label' => __('30 Minutes')],
            ['value' => '40', 'label' => __('40 Minutes')],
            ['value' => '50', 'label' => __('50 Minutes')],
            ['value' => '60', 'label' => __('1 Hour')],
            ['value' => '120', 'label' => __('2 Hours')],
            ['value' => '180', 'label' => __('3 Hours')],
            ['value' => '240', 'label' => __('4 Hours')],
            ['value' => '300', 'label' => __('5 Hours')],
            ['value' => '360', 'label' => __('6 Hours')],
            ['value' => '720', 'label' => __('12 Hours')],
            ['value' => '1440', 'label' => __('24 Hours')],
            ['value' => '2160', 'label' => __('36 Hours')],
            ['value' => '2880', 'label' => __('48 Hours')],
            ['value' => '3600', 'label' => __('60 Hours')],
            ['value' => '4320', 'label' => __('72 Hours')],
        ];
    }
}
