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
namespace Alvis\Widgets\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;

class Example extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'widget/example.phtml';

    /**
     * Render block html
     * @return string
     */
    protected function _toHtml()
    {
        $this->setTemplate($this->_template);
        return parent::_toHtml();
    }
}
