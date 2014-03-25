<?php

/**
 * @category    Foggyline
 * @package     Foggyline_SingleResultSearch
 * @copyright   Copyright (c) Branko Ajzele <ajzele@gmail.com>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Foggyline_SingleResultSearch_Model_System_Config_Source_Notification_Message_Type {

    private $_helper;

    public function __construct() {
        $this->_helper = Mage::helper('foggyline_singleresultsearch');
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray() {
        return array(
            array('value' => 'success', 'label' => $this->_helper->__('Success')),
            array('value' => 'notice', 'label' => $this->_helper->__('Notice')),
            array('value' => 'warning', 'label' => $this->_helper->__('Warning')),
            array('value' => 'error', 'label' => $this->_helper->__('Error')),
        );
    }

}
