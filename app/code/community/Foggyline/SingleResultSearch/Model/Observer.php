<?php

/**
 * @category    Foggyline
 * @package     Foggyline_SingleResultSearch
 * @copyright   Copyright (c) Branko Ajzele <ajzele@gmail.com>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Foggyline_SingleResultSearch_Model_Observer {

    private $_helper;
    private $_store;

    public function __construct() {
        $this->_helper = Mage::helper('foggyline_singleresultsearch');
        $this->_store = Mage::app()->getStore();
    }

    public function redirectToProductPage($observer) {

        if (!$this->_helper->isModuleOutputEnabled()) {
            return;
        }

        $result = Mage::app()->getLayout()->getBlock('search_result_list');
        $products = $result->getLoadedProductCollection();

        if (1 === (int) $products->getSize()) {
            if ($this->_helper->getMsgShow()) {
                $msg = $this->_helper->getMsgLabel();
                $msg = str_replace('[[PRODUCT]]', $products->getFirstItem()->getName(), $msg);

                $message = Mage::getSingleton('core/message')
                        ->{$this->_helper->getMsgType()}($msg);

                Mage::getSingleton('core/session')->addMessage($message);
            }

            if ('catalogsearch_result_index' === $observer->getControllerAction()->getFullActionName()) {
                $params = $observer->getControllerAction()->getRequest()->getParams();
                header(sprintf('Location: %s?%s', $products->getFirstItem()->getProductUrl(), http_build_query($params)));
                exit;
            } else {
                header('Location: '.$products->getFirstItem()->getProductUrl());
                exit;
            }
        }
    }

}
