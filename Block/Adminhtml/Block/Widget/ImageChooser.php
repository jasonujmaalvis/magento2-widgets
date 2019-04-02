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

use Magento\Framework\Data\Form\Element\AbstractElement as Element;
use Magento\Backend\Block\Template\Context as TemplateContext;
use Magento\Framework\Data\Form\Element\Factory as FormElementFactory;
use Magento\Backend\Block\Template;

class ImageChooser extends Template {

    /**
     * @var \Magento\Framework\Data\Form\Element\Factory
     */
    protected $elementFactory;

    /**
     * @param TemplateContext $context
     * @param FormElementFactory $elementFactory
     * @param array $data
     */
    public function __construct(
        TemplateContext $context,
        FormElementFactory $elementFactory,
        $data = []
    ) {
        $this->elementFactory = $elementFactory;
        parent::__construct($context, $data);
    }

    /**
     * Prepare chooser element HTML
     *
     * @param Element $element
     * @return Element
     */
    public function prepareElementHtml(Element $element) {
        $config = $this->_getData('config');
        $sourceUrl = $this->getUrl('cms/wysiwyg_images/index', ['target_element_id' => $element->getId(), 'type' => 'file']);

        /** @var \Magento\Backend\Block\Widget\Button $chooser */
        $chooser = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button')
            ->setType('button')
            ->setClass('btn-chooser')
            ->setLabel($config['button']['open'])
            ->setOnClick('delete MediabrowserUtility.modal;MediabrowserUtility.openDialog(\'' . $sourceUrl . '\')')
            ->setDisabled($element->getReadonly());

        /** @var \Magento\Framework\Data\Form\Element\Text $input */
        $input = $this->elementFactory->create("text", ['data' => $element->getData()]);
        $input->setId($element->getId());
        $input->setForm($element->getForm());
        $input->setClass("widget-option input-text admin__control-text");

        if($element->getRequired()) {
            $input->addClass('required-entry');
        }

        $image = '<div class="file-uploader-preview">';
            $image .= '<a href="' . $element->getValue() . '" target="_blank">';
                $image .= '<img src="' . $element->getValue() . '" class="preview-image" />';
            $image .= '</a>';
        $image .= '</div>';

        $css = '<style>.field-' . $element->getId() . ' .control-value{display:none;}</style>';
        $element->setData( 'after_element_html', $image . $css . $input->getElementHtml() . $chooser->toHtml() );

        return $element;
    }
}
