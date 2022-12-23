<?php
/**
 * Class Interval
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


class Interval implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Available times.
     *
     * @var array
     */
    public $times
        = [
            1,
            2,
            3,
            4,
            5,
            6,
            12,
            24,
            36,
            48,
            60,
            72,
            84,
            96,
            108,
            120,
            240,
        ];

    /**
     * Send to campain options hours.
     *
     * @return array
     */
    public function toOptionArray()
    {
        $result = $row = [];
        $i = 0;
        foreach ($this->times as $one) {
            if ($i == 0) {
                $row = [
                    'value' => $one,
                    'label' => $one . __(' Hour'),
                ];
            } else {
                $row = [
                    'value' => $one,
                    'label' => $one . __(' Hours'),
                ];
            }
            $result[] = $row;
            ++$i;
        }

        return $result;
    }
}
