<?php
/**
 * Alvis Widgets
 *
 * @category    Alvis
 * @package     Alvis_Widgets
 * @author      Jason Ujma-Alvis
 * @copyright   Copyright (c) 2019 Jason Ujma-Alvis (https://jason.codes)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
namespace Alvis\Widgets\Model\Config\Source;

use \Magento\Framework\Option\ArrayInterface;

class Custom implements ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'one', 'label' => __('Option One')],
            ['value' => 'two', 'label' => __('Option Two')],
            ['value' => 'three', 'label' => __('Option Three')],
            ['value' => 'four', 'label' => __('Option Four')]
        ];
    }
}
