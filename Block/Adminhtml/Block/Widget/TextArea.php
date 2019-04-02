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
namespace Alvis\Widgets\Block\Adminhtml\Block\Widget;

use \Magento\Backend\Block\Template;

Class TextArea extends Template {
    protected $_elementFactory;

    /**
    * @param \Magento\Backend\Block\Template\Context $context
    * @param \Magento\Framework\Data\Form\Element\Factory $elementFactory
    * @param array $data
    */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Data\Form\Element\Factory $elementFactory,
        array $data = []
    ) {
        $this->_elementFactory = $elementFactory;
        parent::__construct($context, $data);
    }

    /**
    * Prepare chooser element HTML
    *
    * @param \Magento\Framework\Data\Form\Element\AbstractElement $element Form Element
    * @return \Magento\Framework\Data\Form\Element\AbstractElement
    */
    public function prepareElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $input = $this->_elementFactory->create("textarea", ['data' => $element->getData()]);
        $input->setId($element->getId());
        $input->setForm($element->getForm());
        $input->setClass("widget-option input-textarea admin__control-text");

        if ($element->getRequired()) {
            $input->addClass('required-entry');
        }

        $css = '<style>.field-' . $element->getId() . ' .control-value{display:none;}</style>';

        $element->setData('after_element_html', $css . $input->getElementHtml());
        return $element;
    }
}
