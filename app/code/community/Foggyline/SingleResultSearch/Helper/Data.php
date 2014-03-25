<?php

/**
 * @category    Foggyline
 * @package     Foggyline_SingleResultSearch
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Branko Ajzele (http://foggyline.net/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Foggyline_SingleResultSearch_Helper_Data extends Mage_Core_Helper_Abstract {

    const CONFIG_ACTIVE = 'catalog/foggyline_singleresultsearch/active';
    const CONFIG_MSG_SHOW = 'catalog/foggyline_singleresultsearch/msg_show';
    const CONFIG_MSG_TYPE = 'catalog/foggyline_singleresultsearch/msg_type';
    const CONFIG_MSG_LABEL = 'catalog/foggyline_singleresultsearch/msg_label';

    public function isModuleEnabled($moduleName = null) {
        if (Mage::getStoreConfig(self::CONFIG_ACTIVE) == '0') {
            return false;
        }

        return parent::isModuleEnabled($moduleName = null);
    }

    public function getMsgShow($store = null) {
        if (Mage::getStoreConfig(self::CONFIG_MSG_SHOW, $store) == '0') {
            return false;
        }

        return true;
    }

    public function getMsgType($store = null) {
        return Mage::getStoreConfig(self::CONFIG_MSG_TYPE, $store);
    }

    public function getMsgLabel($store = null) {
        return Mage::getStoreConfig(self::CONFIG_MSG_LABEL, $store);
    }

}
