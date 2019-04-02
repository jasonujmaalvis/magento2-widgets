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
namespace Alvis\Widgets\Model;

use \Magento\Widget\Model\Widget as BaseWidget;

class Widget {

    private $filterProvider;
    private $storeManager;

    /**
     * Widget constructor.
     */
    public function __construct(\Magento\Cms\Model\Template\FilterProvider $filterProvider, \Magento\Store\Model\StoreManagerInterface $storeManager) {
        $this->filterProvider = $filterProvider;
        $this->storeManager = $storeManager;
    }

    public function beforeGetWidgetDeclaration(BaseWidget $subject, $type, $params = [], $asIs = true) {
        // Check for specific image parameters
        $imageParams = [
            'image_chooser'
        ];

        foreach($imageParams as $imageParam) {
            if(key_exists($imageParam, $params)) {
                $url = $params[$imageParam];

                if(strpos($url, '/directive/___directive/') !== false) {
                    $parts = explode('/', $url);
                    $key = array_search("___directive", $parts);

                    if($key !== false) {
                        $url = $parts[$key + 1];

                        // Format the url {{media url="wysiwyg/image.jpg"}}
                        $urlFormatted = strtr($url, '-_,', '+/=');
                        $urlFormatted = str_replace('%2C', '', $urlFormatted);

                        // Decode the url
                        $imgSrc = base64_decode($urlFormatted);

                        $url = $this->filterProvider->getBlockFilter()->setStoreId( $this->storeManager->getStore()->getId() )->filter( $imgSrc );

                        $params[$imageParam] = $url;
                    }
                } else {
                    $url = str_replace('"', "'", $url); // replace " with ' to avoid breaking html
                    $params[$imageParam] = $url;
                }
            }
        }

        return array($type, $params, $asIs);
    }
}
