<?php
class Ktree_Label_Block_Adminhtml_Label extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_label';
        $this->_blockGroup = 'label';
        $this->_headerText = Mage::helper('label')->__('Manage Labels');
        $this->_addButtonLabel = Mage::helper('label')->__('Add New Label');
        parent::__construct();
    }

}
