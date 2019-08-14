<?php
class Ktree_Label_Model_Mysql4_Label extends Mage_Core_Model_Mysql4_Abstract
{

    /**
     * Resource initialization
     */
    public function _construct()
    {
        $this->_init('label/label', 'label_id');
    }

}
